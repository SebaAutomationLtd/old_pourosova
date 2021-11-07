<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function mayor(){
        return view('Admin.Contact.mayor');
    }
    public function uno(){
        return view('Admin.Contact.uno');
    }
    public function admin(){
        return view('Admin.Contact.admin');
    }
    public function engineer(){
        return view('Admin.Contact.engineer');
    }
    public function info(){
        return view('Admin.Contact.info');
    }
}
