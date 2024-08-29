<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
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

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
