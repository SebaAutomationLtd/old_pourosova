<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:other-setup']);
    }

    public function Ward()
    {
        $all = DB::table('wards')->orderBy('id', 'DESC')->get();
        return view('admin.ward.index', compact('all'));
    }

    public function CreateWard()
    {
        return view('admin.ward.create');
    }

    public function StoreWard(Request $request)
    {
        $count = DB::table('wards')->where('ward_no', $request->ward_no)->count();

        $rules = $request->validate([
            'ward_no' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['ward_no'] = $request->ward_no;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Ward has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('wards')->insert($data);
            $notification = array(
                'messege' => 'Successfully, Ward Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function EditWard($id)
    {
        $edit = DB::table('wards')->where('id', $id)->first();
        return view('admin.ward.edit', compact('edit'));
    }

    public function DeleteWard($id)
    {
        DB::table('wards')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Successfully, Ward Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateWard(Request $request, $id)
    {
        $get_data = DB::table('wards')->where('id', $id)->first();

        $rules = $request->validate([
            'ward_no' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $count = DB::table('wards')->where('ward_no', '!=', $get_data->ward_no)->where('ward_no', $request->ward_no)->count();
        $data = array();
        $data['ward_no'] = $request->ward_no;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Ward has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('wards')->where('id', $id)->update($data);
            $notification = array(
                'messege' => 'Successfully, Ward Updated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
