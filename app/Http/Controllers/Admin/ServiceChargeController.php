<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ServiceChargeController extends Controller
{
   public function __construct()
   {
       $this->middleware('admin');
   }
    public function ServiceCharge()
    {   
    	$data = DB::table('service_charges')->where('id',1)->first();
    	return view('admin.service_charge.create', compact('data'));
    }

    public function UpdateGeneralFee(Request $request)
    {
    	DB::table('service_charges')
    	   ->where('id',1)
    	   ->update(['general_fee' => $request->general_fee]);
    	$notification=array(
                     'messege'=>'Successfully, General Fee Inserted',
                     'alert-type'=>'success'
                    );
        return Redirect()->back()->with($notification);
    }

    public function UpdateCommercialFee(Request $request)
    {
    	DB::table('service_charges')
    	   ->where('id',1)
    	   ->update(['commercial_fee' => $request->commercial_fee]);
    	$notification=array(
                     'messege'=>'Successfully, Commercial Fee Inserted',
                     'alert-type'=>'success'
                    );
        return Redirect()->back()->with($notification);
    }

    public function UpdateBusineeFee(Request $request)
    {
    	DB::table('service_charges')
    	   ->where('id',1)
    	   ->update(['business_fee' => $request->business_fee]);
    	$notification=array(
                     'messege'=>'Successfully, Business Fee Inserted',
                     'alert-type'=>'success'
                    );
        return Redirect()->back()->with($notification);
    }
}
