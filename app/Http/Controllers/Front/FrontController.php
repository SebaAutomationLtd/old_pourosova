<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FrontController extends Controller {

    public function notice() {

        $data['notices'] = DB::table('notices')
                ->where('type', 'notice')
                ->where('status', 1)
                ->where('category', 'নোটিশ')
                ->orWhere('category', 'নিয়োগ বিজ্ঞপ্তি')
                ->orderBy('created_at', 'desc')
                ->get();
        return view('Front.notice', $data);
    }

    public function download() {

        $data['notices'] = DB::table('notices')
                ->where('type', 'download')
                ->where('status', 1)
                ->where('category', 'ফরম')
                ->orderBy('created_at', 'desc')
                ->get();
        return view('Front.download', $data);
    }

    public function citizen() {

        $data['notice'] = DB::table('notices')
                ->where('type', 'download')
                ->where('status', 1)
                ->where('category', 'সিটিজেন চার্টার')
                ->first();
        return view('Front.citizen-chartered', $data);
    }

    public function onceEye() {

        $data['notice'] = DB::table('notices')
                ->where('type', 'download')
                ->where('status', 1)
                ->where('category', 'এক নজরে')
                ->first();
        return view('Front.once-eye', $data);
    }

    public function mayorProfile() {

        $data['mayor'] = DB::table('meyors')
                ->where('id', 1)
                ->first();
        return view('Front.mayor-profile-contact', $data);
    }

    public function councilorProfile() {

        $data['councilors'] = DB::table('councilors')
                ->orderBy('ward_no', 'asc')
                ->get();
        return view('Front.counsilor', $data);
    }

    public function unoProfile() {

        $data['uno'] = DB::table('departments')
                ->where('type', 'head')
                ->where('department', 'uno')
                ->first();
        return view('Front.uno', $data);
    }

    public function adminProfile() {

        $data['admin'] = DB::table('departments')
                ->where('type', 'head')
                ->where('department', 'admin')
                ->first();
        return view('Front.administration', $data);
    }

    public function engineerProfile() {

        $data['engineer'] = DB::table('departments')
                ->where('type', 'head')
                ->where('department', 'engineer')
                ->first();
        $data['others'] = DB::table('departments')->where('type', 'others')->where('department', 'engineer')->get();
        return view('Front.engineering-department', $data);
    }

}
