<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class BusinessRateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:tax-rate-setup']);
    }

    public function BusinessRate()
    {
        $all = DB::table('business_hold_rates')
            ->join('house_types', 'business_hold_rates.house_type_id', 'house_types.id')
            ->select('house_types.name', 'business_hold_rates.*')
            ->orderBy('business_hold_rates.id', 'DESC')
            ->get();
        return view('admin.business_rate.index', compact('all'));
    }

    public function CreateBusinessRate()
    {
        return view('admin.business_rate.create');
    }

    public function StoreBusinessRate(Request $request)
    {

        $rules = $request->validate([
            'house_type_id' => 'required',
            'use_type' => 'required',
            'tax_rate' => 'required',
            'status' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['house_type_id'] = $request->house_type_id;
        $data['use_type'] = $request->use_type;
        $data['tax_rate'] = $request->tax_rate;
        $data['status'] = $request->status;
        DB::table('business_hold_rates')->insert($data);
        $notification = array(
            'messege' => 'Successfully, Business Rate Inserted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditBusinessRate($id)
    {
        $edit = DB::table('business_hold_rates')->where('id', $id)->first();
        return view('admin.business_rate.edit', compact('edit'));
    }

    public function DeleteBusinessRate($id)
    {
        DB::table('business_hold_rates')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Successfully, Business Rate Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateBusinessRate(Request $request, $id)
    {
        $rules = $request->validate([
            'house_type_id' => 'required',
            'use_type' => 'required',
            'tax_rate' => 'required',
            'status' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = array();
        $data['house_type_id'] = $request->house_type_id;
        $data['use_type'] = $request->use_type;
        $data['tax_rate'] = $request->tax_rate;
        $data['status'] = $request->status;
        DB::table('business_hold_rates')->where('id', $id)->update($data);
        $notification = array(
            'messege' => 'Successfully, Business Rate Updated',
            'alert-type' => 'success'
        );
        return Redirect()->route('business.rate')->with($notification);
    }
}
