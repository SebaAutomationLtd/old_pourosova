<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MayorController extends Controller
{
    public function index(){
        return view('Admin.Mayor.mayor-panel-view');
    }

    public function create(){
        return view('Admin.Mayor.mayor-panel-add');
    }
}
