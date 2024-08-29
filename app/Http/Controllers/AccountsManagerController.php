<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsManagerController extends Controller
{
    //
    public function index()
    {
        return view('accountsmanager.dashboard');
    }
}
