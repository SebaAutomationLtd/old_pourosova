<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class CouncilorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:website-settings']);
    }
    //For Male
    // public function index(){
    //     return view('Admin.Councilor.councilor-view');
    // }

    // public function create(){
    //     return view('Admin.Councilor.councilor-add');
    // }
    // //For Male End


    // //For Female
    // //For Male
    // public function indexFemale(){
    //     return view('Admin.Councilor-Female.councilor-view');
    // }

    // public function createFemale(){
    //     return view('Admin.Councilor-Female.councilor-add');
    // }
    //For Female End

    public function Councilors()
    {
        $all = DB::table('councilors')->orderBy('id', 'DESC')->get();
        return view('admin.Councilor.index', compact('all'));
    }

    public function AddCouncilor()
    {
        return view('admin.Councilor.create');
    }

    public function InsertCouncilor(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['ward_no'] = $request->ward_no;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('upload/Councilor'), $imageName);
            $data['image'] = 'upload/Councilor/' . $imageName;

        }

        DB::table('councilors')->insert($data);
        $notification = array(
            'messege' => 'Successfully, Councilor Inserted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditCouncilor($id)
    {
        $edit = DB::table('councilors')->where('id', $id)->first();
        return view('admin.Councilor.edit', compact('edit'));
    }

    public function UpdateCouncilor(Request $request, $id)
    {
        $get_data = DB::table('councilors')->where('id', $id)->first();

        $data = array();
        $data['name'] = $request->name;
        $data['ward_no'] = $request->ward_no;

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('upload/Councilor'), $imageName);

            $data['image'] = 'upload/Councilor/' . $imageName;

        } else {
            $data['image'] = $get_data->image;
        }

        DB::table('councilors')->where('id', $id)->update($data);


        $notification = array(
            'messege' => 'Successfully, Councilor Updated',
            'alert-type' => 'success'
        );
        return Redirect('/councilors')->with($notification);

    }

    public function DeleteCouncilor($id)
    {
        $get_data = DB::table('councilors')->where('id', $id)->first();
        DB::table('councilors')->where('id', $id)->delete();
        unlink($get_data->image);

        $notification = array(
            'messege' => 'Successfully, Councilor Deleted',
            'alert-type' => 'success'
        );
        return Redirect('/councilors')->with($notification);
    }

    public function MohilaCouncilors()
    {
        $all = DB::table('mohila_councilors')->orderBy('id', 'DESC')->get();
        return view('admin.Councilor.all_mohila_councilor', compact('all'));
    }

    public function AddMohilaCouncilor()
    {
        return view('admin.Councilor.create_mohila_councilor');
    }

    public function InsertMohilaCouncilor(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('upload/Councilor'), $imageName);

            $data['image'] = 'upload/Councilor/' . $imageName;

        }


        DB::table('mohila_councilors')->insert($data);
        $notification = array(
            'messege' => 'Successfully, Mohlia Councilor Inserted',
            'alert-type' => 'success'
        );
        return Redirect('/councilors-mohila')->with($notification);
    }

    public function EditMohilaCouncilor($id)
    {
        $edit = DB::table('mohila_councilors')->where('id', $id)->first();
        return view('admin.Councilor.edit_mohila_councilor', compact('edit'));
    }

    public function UpdateMohilaCouncilor(Request $request, $id)
    {
        $get_data = DB::table('mohila_councilors')->where('id', $id)->first();
        $data = array();
        $data['name'] = $request->name;


        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('upload/Councilor'), $imageName);

            $data['image'] = 'upload/Councilor/' . $imageName;

        } else {
            $data['image'] = $get_data->image;
        }

        DB::table('mohila_councilors')->where('id', $id)->update($data);


        $notification = array(
            'messege' => 'Successfully, Mohila Councilor Updated',
            'alert-type' => 'success'
        );
        return Redirect('/councilors-mohila')->with($notification);
    }

    public function DeleteMohilaCouncilor($id)
    {
        $get_data = DB::table('mohila_councilors')->where('id', $id)->first();
        DB::table('mohila_councilors')->where('id', $id)->delete();

        $notification = array(
            'messege' => 'Successfully, Mohila Councilor Deleted',
            'alert-type' => 'success'
        );
        return Redirect('/councilors-mohila')->with($notification);

    }
}
