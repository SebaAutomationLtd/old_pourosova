<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:other-setup']);
    }

    public function Village()
    {
        $all = DB::table('villages')
            ->join('wards', 'villages.ward_id', 'wards.id')
            ->select('wards.ward_no', 'villages.*')
            ->orderBy('villages.id', 'DESC')
            ->get();
        return view('admin.village.index', compact('all'));
    }

    public function CreateVillage()
    {
        return view('admin.village.create');
    }

    public function StoreVillage(Request $request)
    {
        $count = DB::table('villages')->where('village_name', $request->village_name)->count();

        $rules = $request->validate([
            'village_name' => 'required',
            'ward_id' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['village_name'] = $request->village_name;
        $data['ward_id'] = $request->ward_id;

        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Village has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('villages')->insert($data);
            $notification = array(
                'messege' => 'Successfully, Village Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function EditVillage($id)
    {
        $edit = DB::table('villages')->where('id', $id)->first();
        return view('admin.village.edit', compact('edit'));
    }

    public function DeleteVillage($id)
    {
        DB::table('villages')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Successfully, Village Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateVillage(Request $request, $id)
    {
        $get_data = DB::table('villages')->where('id', $id)->first();

        $count = DB::table('villages')->where('village_name', '!=', $get_data->village_name)->where('village_name', $request->village_name)->count();

        $rules = $request->validate([
            'village_name' => 'required',
            'ward_id' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['village_name'] = $request->village_name;
        $data['ward_id'] = $request->ward_id;

        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Village has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('villages')->where('id', $id)->update($data);
            $notification = array(
                'messege' => 'Successfully, Village Updated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


}
