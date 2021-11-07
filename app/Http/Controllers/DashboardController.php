<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function Dashboard()
    {
        return view('dashboard');
    }
}
