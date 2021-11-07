<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class PostOfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:other-setup']);
    }

    public function PostOffice()
    {
        $all = DB::table('post_offices')
            ->join('post_codes', 'post_offices.post_code_id', 'post_codes.id')
            ->select('post_codes.post_code', 'post_offices.*')
            ->orderBy('post_offices.id', 'DESC')
            ->get();
        return view('admin.post_office.index', compact('all'));
    }

    public function CreatePostOffice()
    {
        return view('admin.post_office.create');
    }

    public function StorePostOffice(Request $request)
    {
        $count = DB::table('post_offices')->where('post_office', $request->post_office)->count();

        $rules = $request->validate([
            'post_code_id' => 'required',
            'post_office' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['post_code_id'] = $request->post_code_id;
        $data['post_office'] = $request->post_office;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Post Office has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('post_offices')->insert($data);
            $notification = array(
                'messege' => 'Successfully, Post Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function EditPostOffice($id)
    {
        $edit = DB::table('post_offices')->where('id', $id)->first();
        return view('admin.post_office.edit', compact('edit'));
    }

    public function UpdatePostOffice(Request $request)
    {
        $get_data = DB::table('post_offices')->where('id', $request->post_office_id)->first();

        $rules = $request->validate([
            'post_code_id' => 'required',
            'post_office' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $count = DB::table('post_offices')->where('post_office', '!=', $get_data->post_office)->where('post_office', $request->post_office)->count();
        $data = array();
        $data['post_code_id'] = $request->post_code_id;
        $data['post_office'] = $request->post_office;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Post Office has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('post_offices')->where('id', $request->post_office_id)->update($data);
            $notification = array(
                'messege' => 'Successfully, Post Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('post.office')->with($notification);
        }
    }

    public function DeletePostOffice($id)
    {
        DB::table('post_offices')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Successfully, Post Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
