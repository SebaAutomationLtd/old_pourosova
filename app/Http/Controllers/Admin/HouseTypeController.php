<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HouseTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:tax-rate-setup']);
    }

    public function HouseType()
    {
        $all = DB::table('house_types')->orderBy('id', 'DESC')->get();
        return view('admin.house_type.index', compact('all'));
    }

    public function CreateHouseType()
    {
        return view('admin.house_type.create');
    }

    public function StoreHouseType(Request $request)
    {
        $count = DB::table('house_types')->where('name', $request->name)->count();
        $rules = $request->validate([
            'name' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = array();
        $data['name'] = $request->name;
        $data['status'] = $request->status;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This HouseType has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('house_types')->insert($data);
            $notification = array(
                'messege' => 'Successfully, HouseType Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function EditHouseType($id)
    {
        $edit = DB::table('house_types')->where('id', $id)->first();
        return view('admin.house_type.edit', compact('edit'));
    }

    public function UpdateHouseType(Request $request, $id)
    {
        $get_data = DB::table('house_types')->where('id', $id)->first();
        $rules = $request->validate([
            'name' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $count = DB::table('house_types')->where('name', '!=', $get_data->name)->where('name', $request->name)->count();
        $data = array();
        $data['name'] = $request->name;
        $data['status'] = $request->status;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This HouseType has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('house_types')->where('id', $id)->update($data);
            $notification = array(
                'messege' => 'Successfully, HouseType Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('house.type')->with($notification);
        }
    }

    public function DeleteHouseType($id)
    {
        DB::table('house_types')->where('id', $id)->first();
        $notification = array(
            'messege' => 'Successfully, HouseType Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->route('house.type')->with($notification);
    }
}
