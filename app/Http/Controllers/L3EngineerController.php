<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class L3EngineerController extends Controller
{
    //
    public function index()
    {
        return view('engineer.dashboard');
    }
}
