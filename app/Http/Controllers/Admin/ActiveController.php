<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ActiveController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:active-deactive-panel']);
    }

    public function search()
    {
        return view('admin.active_members.search');
    }

    public function searchDb(Request $request)
    {

        $data = [];
        if ($request->type == 1) {
            $data['users'] = DB::table('general_members')
                ->where('ward_id', $request->ward_id)
                ->where('mobile', $request->contact)
                ->orWhere('nid', $request->contact)
                ->orWhere('birth_certificate', $request->contact)->get();
            $data['type'] = 1;

        } else {

            $data['users'] = DB::table('business_holds')
                ->where('ward_id', $request->ward_id)
                ->where('mobile', $request->contact)
                ->orWhere('nid', $request->contact)
                ->orWhere('birth_certificate', $request->contact)->get();

            $data['type'] = 2;

        }


        return view('admin.active_members.result', $data);
    }

    public function deactive($id, $type)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        if ($type == 1) {
            DB::table('general_members')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                    'deactive_by' => Auth::user()->id,
                    'deactive_at' => $current_date_time
                ]);
        } else {
            DB::table('business_holds')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                    'deactive_by' => Auth::user()->id,
                    'deactive_at' => $current_date_time
                ]);
        }
        $notification = array(
            'messege' => "Deactivated Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function show($id, $type)
    {

        if ($type == 1) {
            $data['user'] = DB::table('general_members')->where('id', $id)->first();
        } else {
            $data['user'] = DB::table('business_holds')->where('id', $id)->first();
        }


        $data['type'] = $type;
        return view('admin.active_members.show', $data);
    }

    public function activeshow($id, $type)
    {
        // if($type==1){
        //     $data['user'] = DB::table('general_members')->where('id', $id)->first();
        // }
        // else{
        //     $data['user'] = DB::table('business_holds')->where('id', $id)->first();
        // }
        if ($type == 1) {
            $data['user'] = DB::table('general_members')->where('id', $id)
                ->first();
        } else {
            $data['user'] = DB::table('business_holds')->where('id', $id)
                ->first();
        }


        $data['type'] = $type;

        return view('admin.active_members.active', $data);

    }

    public function active(Request $request)
    {
        //  if(!($request->isMethod('post'))){
        //     return view('admin.index');
        // }
        // else{
        //     return view('admin.index');
        //     return 0;
        // }
        $current_date_time = Carbon::now()->toDateTimeString();

        if ($request->type == 1) {
            $a = DB::table('general_members')->where('id', $request->id)->first();
            //  return $a->name;
            DB::table('general_members')
                ->where('id', $request->id)
                ->update([
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                    'payment_type' => $request->payment_type,
                    'activate_by' => Auth::user()->id,
                    'active_at' => $current_date_time
                ]);
            DB::table('users')
                ->where('user_id', $request->user_id_old)
                ->updateOrInsert(
                    [
                        'user_id' => $request->user_id
                    ],
                    [
                        'show_password' => $request->password,
                        'password' => bcrypt($request->password),

                        'name' => $a->name
                    ]
                );
        } else {
            $a = DB::table('business_holds')->where('id', $request->id)->first();
            DB::table('business_holds')
                ->where('id', $request->id)
                ->update([
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                    'payment_type' => $request->payment_type,
                    'activate_by' => Auth::user()->id,
                    'active_at' => $current_date_time
                ]);
            DB::table('users')
                ->where('user_id', $request->user_id_old)
                ->updateOrInsert(
                    [
                        'user_id' => $request->user_id
                    ],

                    [
                        'show_password' => $request->password,
                        'password' => bcrypt($request->password),

                        'name' => $a->owner_name
                    ]);
        }


        $url = "http://premium.mdlsms.com/smsapi";
        $data = [
            "api_key" => "C2000808603de7bf6e9249.14298062",
            "type" => "text",
            "contacts" => $request->mobile,
            "senderid" => "8809612440735",
            "msg" => "অভিনন্দন,আপনার নাগরিক সেবা কার্ড নং  " . $request->user_id . "  সফল ভাবে চালু হয়েছে .সেবা গ্রহনের জন্য আপনার কার্ডের QR কোড স্ক্যান করে লগইন করুন \n\nমাদারগঞ্জ পৌরসভা",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);


        $url = "http://premium.mdlsms.com/smsapi";
        $data = [
            "api_key" => "C2000808603de7bf6e9249.14298062",
            "type" => "text",
            "contacts" => $request->mobile,
            "senderid" => "8809612440735",
            "msg" => "নাগরিক সেবা কার্ড চার্জ ১৫০টাকা সফল ভাবে পরিশোধ হয়েছে,কার্ড নং  " . $request->user_id . "\n\n লাল্মনিরহাট পৌরসভা **",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);


        $notification = array(
            'messege' => "Activated Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->route('action.search')->with($notification);
    }
}
