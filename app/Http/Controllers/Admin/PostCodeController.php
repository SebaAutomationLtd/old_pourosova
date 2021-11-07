<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\PostCode;
use DB;
use Illuminate\Http\Request;

class PostCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:other-setup']);
    }

    public function PostCode()
    {
        $all = DB::table('post_codes')->orderBy('id', 'DESC')->get();
        return view('admin.post_code.index', compact('all'));
    }

    public function CreatePostCode()
    {
        return view('admin.post_code.create');
    }

    public function StorePostCode(Request $request)
    {
        $count = DB::table('post_codes')->where('post_code', $request->post_code)->count();

        $rules = $request->validate([
            'post_code' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['post_code'] = $request->post_code;
        if ($count > 0) {
            $notification = array(
                'messege' => 'Already, This Post Code has been exist',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('post_codes')->insert($data);
            $notification = array(
                'messege' => 'Successfully Post Code Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function EditPostCode($id)
    {
        $edit = DB::table('post_codes')->where('id', $id)->first();
        return view('admin.post_code.edit', compact('edit'));
    }

    public function UpdatePostCode(Request $request, $id)
    {

        $rules = $request->validate([
            'post_code' => 'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = PostCode::find($id);
        if ($data->post_code == $request->post_code) {
            $notification = array(
                'messege' => 'This data is already exist. No need to update',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            $data->post_code = $request->post_code;
            $data->save();
            $notification = array(
                'messege' => 'Successfully Post Code Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('post.code')->with($notification);
        }

    }

    public function DeletePostCode($id)
    {
        $data = PostCode::find($id)->delete();
        if ($data) {
            $notification = array(
                'messege' => 'Successfully Post Code Deleted',
                'alert-type' => 'success'
            );
            return Redirect()->route('post.code')->with($notification);
        }

    }
}
