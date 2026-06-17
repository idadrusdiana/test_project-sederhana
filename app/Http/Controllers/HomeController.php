<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function chart()
    {
        return view('dashboard.chart');
    }
}
