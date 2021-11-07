<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
class AccessController extends Controller
{
    public function AdminLogin(Request $request)
    {
    	$data = $request->all();
        // return bcrypt( $request->password);
    	if(Auth::attempt(['email'=> $data['email'], 'password'=>$data['password']])){
    		return redirect()->route('dashboard');
    	}else{
    		$notification=array(
                     'messege'=>'Email Or Password Invalid',
                     'alert-type'=>'error'
                    );
            return Redirect()->back()->with($notification);
    	}
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
