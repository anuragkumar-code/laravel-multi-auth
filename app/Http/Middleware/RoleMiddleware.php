<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {   
        Log::info('RoleMiddleware is being executed.');
        
        try {
            $token = Cookie::get('token');
            Log::info('Token retrieved from cookie: ' . $token);
    
            if (!$token) {
                Log::warning('Token is missing.');
                return redirect()->route('login')->withErrors('Unauthorized access');
            }
    
            $user = JWTAuth::setToken($token)->authenticate();
            Log::info('Authenticated User: ' . $user->email);
    
            if (!$user) {
                Log::warning('User not authenticated.');
                return redirect()->route('login')->withErrors('Unauthorized access');
            }
    
            if (in_array($user->role, $roles)) {
                return $next($request);
            }
    
            Log::warning('Role mismatch for user: ' . $user->email);
            return redirect()->route('login')->withErrors('Unauthorized access');
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return redirect()->route('login')->withErrors('Unauthorized access');
        }
    }
}
