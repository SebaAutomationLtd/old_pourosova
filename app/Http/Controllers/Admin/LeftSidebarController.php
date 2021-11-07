<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeftSidebarController extends Controller
{
    public function appView(){
        return view('Admin.Sidebar.left-app');
    }

    public function bannerView(){
        return view('Admin.Sidebar.left-banner');
    }
}
