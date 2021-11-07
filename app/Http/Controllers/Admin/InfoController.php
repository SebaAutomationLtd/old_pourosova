<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function info(){
        return view('Admin.Info.info');
    }

    public function organogram(){
        return view('Admin.Info.organogram');
    }
    public function map(){
        return view('Admin.Info.map');
    }
    public function employee(){
        return view('Admin.Info.employee');
    }
    public function education(){
        return view('Admin.Info.education');
    }

    public function contact(){
        return view('Admin.Info.contact');
    }
}
