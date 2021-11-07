<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:other-setup']);
    }

    public function BusinessType()
    {
        $all = DB::table('business_types')->orderBy('id', 'DESC')->get();
        return view('admin.business_type.index', compact('all'));
    }

    public function CreateBusinessType()
    {
        return view('admin.business_type.create');
    }

    public function StoreBusinessType(Request $request)
    {
        $count = DB::table('business_types')->where('name', $request->name)->count();

        $rules = $request->validate([
            'name' => 'required',
            'start_capital_range' => 'required',
            'last_capital_range' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['name'] = $request->name;
        $data['start_capital_range'] = $request->start_capital_range;
        $data['last_capital_range'] = $request->last_capital_range;
        $data['status'] = 1;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Business Type has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('business_types')->insert($data);
            $notification = array(
                'messege' => 'Successfully, Business Type Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function ActiveBusinessType($id)
    {
        DB::table('business_types')
            ->where('id', $id)
            ->update(['status' => 1]);
        $notification = array(
            'messege' => "Successfully, Business Type's Status Updated",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function InactiveBusinessType($id)
    {
        DB::table('business_types')
            ->where('id', $id)
            ->update(['status' => 0]);
        $notification = array(
            'messege' => "Successfully, Business Type's Status Updated",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteBusinessType($id)
    {
        DB::table('business_types')->where('id', $id)->delete();
        $notification = array(
            'messege' => "Successfully, Business Type Deleted",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditBusinessType($id)
    {
        $edit = DB::table('business_types')->where('id', $id)->first();
        return view('admin.business_type.edit', compact('edit'));
    }

    public function UpdateBusinessType(Request $request, $id)
    {
        $get_data = DB::table('business_types')->where('id', $id)->first();
        $rules = $request->validate([
            'name' => 'required',
            'start_capital_range' => 'required',
            'last_capital_range' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $count = DB::table('business_types')->where('name', '!=', $get_data->name)->where('name', $request->name)->count();
        $data = array();
        $data['name'] = $request->name;
        $data['start_capital_range'] = $request->start_capital_range;
        $data['last_capital_range'] = $request->last_capital_range;
        $data['status'] = 1;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Business Type has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('business_types')->where('id', $id)->update($data);
            $notification = array(
                'messege' => 'Successfully, Business Type Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('business.type')->with($notification);
        }
    }
}
