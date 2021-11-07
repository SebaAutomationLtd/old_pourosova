<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function slider(){
        return view('Admin.Index.slider');
    }
    public function about(){
        return view('Admin.Index.about');
    }
}
