<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index(){
        return view('Admin.Structure.logo');
    }

    public function logo(){
        return view('Admin.Structure.logo');
    } 
    public function marquee(){
        return view('Admin.Structure.marquee');
    }
    public function councilor(){
        return view('Admin.Structure.councilor');
    }

}
