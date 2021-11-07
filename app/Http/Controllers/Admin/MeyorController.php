<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class MeyorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:website-settings']);
    }

    public function CreateMeyor()
    {
        $edit = DB::table('meyors')->where('id', 1)->first();
        return view('admin.meyor.create', compact('edit'));
    }

    public function UpdateMeyor(Request $request, $id)
    {
        $get_data = DB::table('meyors')->where('id', $id)->first();
        $data = array();
        $data['name'] = $request->name;
        $data['meyor_place'] = $request->meyor_place;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('upload/Meyor'), $imageName);
            $data['image'] = 'upload/Meyor/' . $imageName;

        }

        DB::table('meyors')->where('id', $id)->update($data);
        $notification = array(
            'messege' => "Successfully, Meyor's Updated",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
