<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class SmsController extends Controller
{
	

    public function SmsVerfication()
    {
    	return view('sms');
    }

    public function CodeVerfication(Request $request)
    {     
         $data = $request->all();
 		 $user_id = Session::get('user_id');
    	$password = Session::get('password');
    	$rand = Session::get('rand');


         $rand_data = DB::table('sms_radoms')->where('random_no',$request->code)->where('random_no',$rand)->count();
        
         if($rand_data > 0){
         	if(Auth::attempt(['user_id'=> $user_id, 'password'=>$password])){
            Session::forget('user_id');
            Session::forget('password');
            Session::forget('rand');
    		return redirect()->route('member.dashboard');
	    	}else{
	    		$notification=array(
	                     'messege'=>'User ID Or Password Invalid',
	                     'alert-type'=>'error'
	                    );
	                return Redirect()->back()->with($notification);
	    	}
         }
         else{
        
         	$notification=array(
	                     'messege'=>'Sorry Code is not matched',
	                     'alert-type'=>'error'
	                    );
	                return Redirect()->back()->with($notification);
         }
         
    }

    public function VerifyMember()
    {   
    	$user_id = Session::get('user_id');
    	$password = Session::get('password');
    	$rand = Session::get('rand');
    	return view('sms', compact('user_id', 'password', 'rand'));
    }
}
