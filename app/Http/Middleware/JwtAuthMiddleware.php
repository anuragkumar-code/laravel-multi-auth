<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;

class JwtAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        $token = $request->cookie('token');
        Log::info('JWT Token retrieved from cookie: ' . $token);

        if (!$token) {
            Log::warning('Token is missing.');
            return redirect()->route('login')->withErrors('Unauthorized access');
        }

        try {
            $user = JWTAuth::setToken($token)->authenticate();
            $request->merge(['user' => $user]); 
            Log::info('Authenticated User: ' . $user->email);
        } catch (\Exception $e) {
            Log::error('Token validation failed: ' . $e->getMessage());
            return redirect()->route('login')->withErrors('Unauthorized access');
        }

        return $next($request);
    }
}
