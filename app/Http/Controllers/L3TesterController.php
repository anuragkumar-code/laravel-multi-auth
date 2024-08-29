<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class L3TesterController extends Controller
{
    //
    public function index()
    {
        return view('tester.dashboard');
    }
}
