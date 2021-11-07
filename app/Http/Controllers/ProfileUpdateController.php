<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileUpdateController extends Controller
{
    public function index(Request $request)
    {
        return view('update_profile.password');
    }

    public function create(Request $request)
    {
        if (!($request->isMethod('post'))) {
            return view('update_profile.password');
        }
        $rules = [
            'old_password' => 'required',
            'new_password_again' => 'required',
            'new_password' => 'required|same:new_password_again|min:8',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!(Hash::check($request->old_password, Auth::user()->password))) {
            return redirect()->back()->with('errmsg', 'Old Password Incorrect');
        }

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'password' => bcrypt($request->new_password)
            ]);
        $notification = array(
            'messege' => "Password Updated Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function email_index()
    {
        return view('update_profile.email');
    }

    public function email_create(Request $request)
    {
        if (!($request->isMethod('post'))) {
            return view('update_profile.email');
        }
        $rules = [
            'old_email' => 'required|email',
            'new_email' => 'required|same:new_email_again|email|unique:users,email',
            'password' => 'required|min:8',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->old_email != Auth::user()->email) {
            return redirect()->back()->with('erroldmail', 'Old Email Incorrect');
        }

        if (!(Hash::check($request->password, Auth::user()->password))) {
            return redirect()->back()->with('erroldpass', 'Old Password Incorrect');
        }

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'email' => $request->new_email
            ]);
        $notification = array(
            'messege' => "Email Updated Successfully",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
