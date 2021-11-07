<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Occupation;
use DB;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:other-setup']);
    }

    public function Occupation()
    {
        $all = DB::table('occupations')->orderBy('id', 'DESC')->get();
        return view('admin.occupation.index', compact('all'));
    }

    public function CreateOccupation()
    {
        return view('admin.occupation.create');
    }

    public function StoreOccupation(Request $request)
    {
        $count = DB::table('occupations')->where('name', $request->name)->count();
        $rules = $request->validate([
            'name' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = array();
        $data['name'] = $request->name;
        $data['status'] = 1;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Occupation has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('occupations')->insert($data);
            $notification = array(
                'messege' => 'Successfully, Occupation Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function InactiveOccupation($id)
    {
        DB::table('occupations')
            ->where('id', $id)
            ->update(['status' => 0]);
        $notification = array(
            'messege' => "Successfully, Occupation's Status Updated",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function ActiveOccupation($id)
    {
        DB::table('occupations')
            ->where('id', $id)
            ->update(['status' => 1]);
        $notification = array(
            'messege' => "Successfully, Occupation's Status Updated",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditOccupation($id)
    {
        $data = Occupation::find($id);
        return view('admin.occupation.edit', compact('data'));
    }

    public function UpdateOccupation(Request $request, $id)
    {

        $rules = $request->validate([
            'name' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Occupation::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->save();
        if ($data) {
            $notification = array(
                'messege' => 'Successfully, Occupation Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('occupation')->with($notification);
        } else {
            $notification = array(
                'messege' => "Something went wrong",
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function DeleteOccupation($id)
    {
        $data = Occupation::find($id)->delete();
        if ($data) {
            $notification = array(
                'messege' => 'Successfully, Occupation Deleted',
                'alert-type' => 'success'
            );
            return Redirect()->route('occupation')->with($notification);
        } else {
            $notification = array(
                'messege' => "Something went wrong",
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
