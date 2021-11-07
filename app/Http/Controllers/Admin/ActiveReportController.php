<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActiveReportController extends Controller
{
    //
    public function index()
    {
        $data['users'] = User::whereHas('roles', function ($query) {
            $query->where('name', 'Support Admin');
        })->get();
        $data['business_hold'] = DB::table('business_holds')
            ->where('added_by', Auth::user()->user_id)->get();
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.active_report.index', $data);
    }

    public function show($userId)
    {
        $id = User::where('user_id', $userId)->first()->id;

        $data['business'] = DB::select('select date(created_at) as date, count(*) as total from business_holds where activate_by="' . $id . '"   group by date(created_at) order by created_at desc');

        $data['general'] = DB::select('select date(created_at) as date, count(*) as total from general_members where activate_by="' . $id . '"   group by date(created_at) order by created_at desc');

        $data['user'] = DB::table('users')->where('user_id', $userId)->first();

        return view('admin.active_report.show', $data);
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
            return view('admin.active_report.search', $data);
        } else if ($request->ward == "" && $request->user == "" && $request->from != '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.active_report.search', $data);
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
            return view('admin.active_report.search', $data);
        } else if ($request->ward !== "" && $request->user == "" && $request->from == '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.active_report.search', $data);
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
            return view('admin.active_report.search', $data);
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
            return view('admin.active_report.search', $data);
        } else if ($request->ward != "" && $request->user == "" && $request->from != '') {
            $data['users_search'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['users'] = User::whereHas('roles', function ($query) {
                $query->where('name', 'Support Admin');
            })->get();
            $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
            return view('admin.active_report.search', $data);
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
            return view('admin.active_report.search', $data);
        }
    }

    public function activeReportGenView($date, $user_id)
    {
        $id = User::where('user_id', $user_id)->first()->id;
        $query = "select * from general_members where activate_by='" . $id . "' and date(created_at)='" . $date . "' order by created_at";

        $data['all'] = DB::select($query);
        // return $data['all'];
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.general_member.support', $data);
    }

    public function activeReportBusinessView($date, $user_id)
    {
        $id = User::where('user_id', $user_id)->first()->id;
        $query = "select * from business_holds where activate_by='" . $id . "' and date(created_at)='" . $date . "' order by created_at";

        $data['all'] = DB::select($query);
        // return $data['all'];
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.business_hold.support', $data);
    }

}
