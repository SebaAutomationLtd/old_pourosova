<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RightSidebarController extends Controller
{

    public function topView(){
        return view('Admin.Sidebar.right-top');
    }

    public function linkView(){
        return view('Admin.Sidebar.right-links');
    }

    public function bannerView(){
        return view('Admin.Sidebar.right-banner');
    }
}
