<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralManagerController extends Controller
{
    //
    public function index()
    {
        return view('generalmanager.dashboard');
    }
}
