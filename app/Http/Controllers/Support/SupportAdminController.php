<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class SupportAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:support-admin-management']);
    }

    public function index()
    {
        $data['users'] = DB::table('users')
            ->where('role_old', 'Support Admin')->get();
        $data['business_hold'] = DB::table('business_holds')
            ->where('added_by', Auth::user()->user_id)->get();
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.support_admin.index', $data);
    }

    public function create()
    {
        return view('admin.support_admin.create');
    }

    public function store(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['contact'] = $request->contact;
        $data['user_id'] = 'SA-' . rand(202, 999);
        $data['role_old'] = "Support Admin";
        $data['password'] = bcrypt($request->password);
        $data['show_password'] = $request->password;
        DB::table('users')->insert($data);
        $notification = array(
            'messege' => 'Successfully, Support Admin Registered',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Successfully, Support Admin Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data['user'] = DB::table('users')->where('id', $id)->first();
        return view('admin.support_admin.edit', $data);
    }

    public function update(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'password' => bcrypt($request->password),
                'show_password' => $request->password
            ]);
        $notification = array(
            'messege' => 'Successfully, Support Admin Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function show($userId)
    {
        $id = $userId;
        if (Auth::user()->role_old === 'Support Admin') {
            $id = Auth::user()->user_id;
        }
        $data['business'] = DB::select('select date(created_at) as date, count(*) as total from business_holds where added_by="' . $id . '"   group by date(created_at) order by created_at desc');

        $data['general'] = DB::select('select date(created_at) as date, count(*) as total from general_members where added_by="' . $id . '"   group by date(created_at) order by created_at desc');

        $data['user'] = DB::table('users')->where('user_id', $id)->first();
        return view('admin.support_admin.show', $data);
    }

    public function filter(Request $request)
    {
        $data['ward_s'] = $request->ward;
        $data['user_s'] = $request->user;
        $data['from_s'] = $request->from;
        $data['to_s'] = $request->to;
        if ($request->ward == "" && $request->user == "" && $request->from == '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        } else if ($request->ward == "" && $request->user == "" && $request->from != '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        } else if ($request->ward == "" && $request->user != "" && $request->from == '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = DB::table('users')
                ->where('user_id', $request->user)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Support Admin');
                })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        } else if ($request->ward !== "" && $request->user == "" && $request->from == '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        } else if ($request->ward == "" && $request->user != "" && $request->from != '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = DB::table('users')
                ->where('user_id', $request->user)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Support Admin');
                })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        } else if ($request->ward != "" && $request->user != "" && $request->from == '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = DB::table('users')
                ->where('user_id', $request->user)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Support Admin');
                })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        } else if ($request->ward != "" && $request->user == "" && $request->from != '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        } else if ($request->ward != "" && $request->user != "" && $request->from != '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = DB::table('users')
                ->where('user_id', $request->user)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Support Admin');
                })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.support_admin.search', $data);
        }
    }

    public function supportAdminGenView($date, $user_id)
    {
        $query = "select * from general_members where added_by='" . $user_id . "' and date(created_at)='" . $date . "' order by created_at";

        $data['all'] = DB::select($query);
        // return $data['all'];
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.general_member.support', $data);
    }

    public function supportAdminBussnessView($date, $user_id)
    {
        $query = "select * from business_holds where added_by='" . $user_id . "' and date(created_at)='" . $date . "' order by created_at";

        $data['all'] = DB::select($query);
        // return $data['all'];
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.general_member.support', $data);
    }
}
