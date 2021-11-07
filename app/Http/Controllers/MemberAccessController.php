<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Session;

session_start();

class MemberAccessController extends Controller
{

    public function MemberLogin(Request $request)
    {
        $user_id = $request->user_id;
        $password = $request->password;


        $rand = rand(123456, 999999);
        $data = array();
        $data['user_id'] = $user_id;
        $data['random_no'] = $rand;

        $count_check_status = DB::table('general_members')->where('user_id', $request->user_id)->count();

        $count_business = DB::table('business_holds')->where('user_id', $request->user_id)->count();

        if ($count_check_status > 0) {
            $check_status = DB::table('general_members')->where('user_id', $request->user_id)->first();
        } elseif ($count_business > 0) {
            $check_status = DB::table('business_holds')->where('user_id', $request->user_id)->first();
        }

        $result = DB::table('users')
            ->where('user_id', $user_id)
            ->where('show_password', $password)
            ->first();
       
        if ($result) {


            if ($check_status->status == '1') {

                Session::put('user_id', $user_id);
                Session::put('password', $password);
                Session::put('rand', $rand);
                DB::table('sms_radoms')->insert($data);

                $url = "http://premium.mdlsms.com/smsapi";
                $data = [
                    "api_key" => "C2000808603de7bf6e9249.14298062",
                    "type" => "text",
                    "contacts" => $check_status->mobile,
                    "senderid" => "8809612440735",
                    "msg" => "lalmonirhat Pourashava Online Login Code is: " . $rand,
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);

                return redirect('/verify-member');
                //return view('sms', compact('user_id', 'password', 'rand'));
            } else {
                $notification = array(
                    'messege' => 'Sorry You are Inactive Member',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'messege' => 'User ID Or Password Invalid',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);


        }


        //   if($check_status->status == '1'){
        //   	if(Auth::attempt(['user_id'=> $data['user_id'], 'password'=>$data['password']])){

        // return redirect()->route('member.dashboard');
        // }else{
        // 	$notification=array(
        //                 'messege'=>'User ID Or Password Invalid',
        //                 'alert-type'=>'error'
        //                );
        //            return Redirect()->back()->with($notification);
        // }
        //   }
        //   else{
        //   	$notification=array(
        //                 'messege'=>'Sorry You are Inactive Member',
        //                 'alert-type'=>'error'
        //                );
        //            return Redirect()->back()->with($notification);
        //   }


    }

    public function MemberDashboard()
    {
        $count_business_hold = DB::table('business_holds')->where('user_id', Auth::user()->user_id)->count();
        if ($count_business_hold > 0) {
            $data = DB::table('business_holds')->where('user_id', Auth::user()->user_id)->first();
        } else {
            $data = DB::table('general_members')->where('user_id', Auth::user()->user_id)->first();
        }

        return view('member_dashboard', compact('data'));
    }

    public function MemberLogout()
    {
        Auth::logout();

        Session::forget('user_id');
        Session::forget('password');
        Session::forget('rand');
        $notification = array(
            'messege' => 'Successfully Logged Out',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    }
}
