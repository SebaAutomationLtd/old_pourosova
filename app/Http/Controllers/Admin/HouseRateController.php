<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HouseRateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:tax-rate-setup']);
    }

    public function HouseRate()
    {
        $all = DB::table('house_rates')
            ->join('house_types', 'house_rates.house_type_id', 'house_types.id')
            ->select('house_types.name', 'house_rates.*')
            ->orderBy('house_rates.id', 'DESC')
            ->get();
        return view('admin.house_rate.index', compact('all'));
    }

    public function EditHouseRate($id)
    {
        $edit = DB::table('house_rates')->where('id', $id)->first();
        return view('admin.house_rate.edit', compact('edit'));
    }

    public function DeleteHouseRate($id)
    {
        DB::table('house_rates')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Successfully, HouseRate Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->route('house.type')->with($notification);
    }

    public function CreateHouseRate()
    {
        return view('admin.house_rate.create');
    }

    public function StoreHouseRate(Request $request)
    {

        $data = array();
        $rules = $request->validate([
            'house_type_id' => 'required',
            'tax_rate' => 'required',
            'status' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data['house_type_id'] = $request->house_type_id;
        $data['tax_rate'] = $request->tax_rate;
        $data['status'] = $request->status;
        DB::table('house_rates')->insert($data);
        $notification = array(
            'messege' => 'Successfully, HouseRate Inserted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateHouseRate(Request $request, $id)
    {
        $rules = $request->validate([
            'house_type_id' => 'required',
            'tax_rate' => 'required',
            'status' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = array();
        $data['house_type_id'] = $request->house_type_id;
        $data['tax_rate'] = $request->tax_rate;
        $data['status'] = $request->status;
        DB::table('house_rates')->where('id', $id)->update($data);
        $notification = array(
            'messege' => 'Successfully, HouseRate Updated',
            'alert-type' => 'success'
        );
        return Redirect()->route('house_type.rate')->with($notification);
    }


}
