<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    //
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) { 
            Log::warning('Invalid credentials for: ' . $request->input('email'));
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $cookie = cookie('token', $token, 60, null, null, false, true, false, 'Lax');
        
        Log::info('User logged in: ' . $user->email);

        return redirect()->intended($this->getRedirectUrl($user))->cookie($cookie);
        
    }

    private function getRedirectUrl($user){

        $redirectUrl = '/login'; 

        switch ($user->role) {
            case User::ROLE_ADMIN:
                $redirectUrl = '/admin/dashboard';
                break;
            case User::ROLE_INVENTORY_MANAGER:
                $redirectUrl = '/inventory/dashboard';
                break;
            case User::ROLE_L3_ENGINEER:
                $redirectUrl = '/l3-engineer/dashboard';
                break;
            case User::ROLE_L3_TESTER:
                $redirectUrl = '/l3-tester/dashboard';
                break;
            case User::ROLE_ACCOUNTS_MANAGER:
                $redirectUrl = '/accounts/dashboard';
                break;
            case User::ROLE_GENERAL_MANAGER:
                $redirectUrl = '/general-manager/dashboard';
                break;
        }

        Log::info('Redirecting user to: ' . $redirectUrl);
        return $redirectUrl;

    }


    public function login_old(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case User::ROLE_ADMIN:
                    return redirect()->intended('/admin/dashboard');
                case User::ROLE_INVENTORY_MANAGER:
                    return redirect()->intended('/inventory/dashboard');
                case User::ROLE_L3_ENGINEER:
                    return redirect()->intended('/l3-engineer/dashboard');
                case User::ROLE_L3_TESTER:
                    return redirect()->intended('/l3-tester/dashboard');
                case User::ROLE_ACCOUNTS_MANAGER:
                    return redirect()->intended('/accounts/dashboard');
                case User::ROLE_GENERAL_MANAGER:
                    return redirect()->intended('/general-manager/dashboard');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors('Unauthorized access.');
            }

        }

        return redirect('/login')->withErrors('Invalid credentials');
    }

    public function logout(){
        JWTAuth::invalidate(JWTAuth::getToken());
        $cookie = Cookie::forget('token');

        return redirect('/login')->withCookie($cookie);
    }

    public function logout_old(){
        Auth::logout();
        return redirect('/login');
    }
}
