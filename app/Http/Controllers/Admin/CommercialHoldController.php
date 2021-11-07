<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
use Carbon\Carbon;
use Auth;
use App\Models\Model\BusinessHold;

class CommercialHoldController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function CommercialHold() {
        $data['all'] = DB::table('commercial_holds')->orderBy('id', 'DESC')->get();
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.commercial_hold.index', $data);
    }

    public function allactivecommercialhold() {
        $data['all'] = DB::table('commercial_holds')->orderBy('id', 'DESC')->where('status', 1)->get();
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.commercial_hold.active', $data);
    }

    public function allinactivecommercialhold() {
        $data['all'] = DB::table('commercial_holds')->orderBy('id', 'DESC')->where('status', 0)->get();
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.commercial_hold.inactive', $data);
    }

    public function ActiveCommercialHold($id) {
        $current_date_time = Carbon::now()->toDateTimeString();
        $get_data = DB::table("commercial_holds")->where('id', $id)->first();
        DB::table('commercial_holds')
                ->where('id', $id)
                ->update([
                    'status' => 1,
                    'activate_by' => Auth::user()->id,
                    'active_at' => $current_date_time
        ]);

        $url = "http://premium.mdlsms.com/smsapi";
        $data = [
            "api_key" => "C2000808603de7bf6e9249.14298062",
            "type" => "text",
            "contacts" => $get_data->mobile,
            "senderid" => "8809612440735",
            "msg" => "Your Nagorik Sheba Card No. {$get_data->user_id} Active. Nagorik Sheba Card Charge BDT {$get_data->service_charge} Tk. Paid Successfull. Payment by {$get_data->payment_type}",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $notification = array(
            'messege' => "Successfully, Business Member's Status Actived",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function InactiveCommercialHold($id) {
        $current_date_time = Carbon::now()->toDateTimeString();
        DB::table('commercial_holds')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                    'deactive_by' => Auth::user()->id,
                    'deactive_at' => $current_date_time
        ]);
        $notification = array(
            'messege' => "Successfully, Business Member's Status Inactived",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function ViewCommercialHold($id) {
        $data['all'] = DB::table('commercial_holds')
                        ->join('users', 'commercial_holds.user_id', 'users.user_id')
                        ->join('wards', 'commercial_holds.ward_id', 'wards.id')
                        ->join('house_types', 'commercial_holds.type_house', 'house_types.id')
                        ->where('commercial_holds.id', $id)->first();
        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.commercial_hold.view', $data);
    }

    public function all_commercial_hold_filter(Request $request) {
        $ward = $request->wardid;
        $nid = $request->nid;
        $mobile = $request->mobile;
        $commercialholds = DB::table('commercial_holds')
                ->join('users', 'commercial_holds.user_id', 'users.user_id')
                ->when($ward, function ($query, $ward) {
                    return $query->where('ward_id', 'like', '%' . $ward . '%');
                })
                ->when($nid, function ($query, $nid) {
                    return $query->where('nid', 'like', '%' . $nid . '%');
                })
                ->when($mobile, function ($query, $mobile) {
                    return $query->where('mobile', 'like', '%' . $mobile . '%');
                })
                ->get();
        $data = [
            'wardid' => $ward,
            'nid' => $nid,
            'mobile' => $mobile,
            'all' => $commercialholds,
            'wards' => DB::table('wards')->orderBy('ward_no', 'asc')->get()
        ];
        return view('admin.commercial_hold.search', $data);
    }

    public function allexportpdfcomdata() {
        $data['all'] = DB::table('commercial_holds')
                        ->join('users', 'commercial_holds.user_id', 'users.user_id')
                        ->join('wards', 'commercial_holds.ward_id', 'wards.id')
                        ->join('house_types', 'commercial_holds.type_house', 'house_types.id')->get();
        $datafor = 'all-' . date('Y-m-d');
        $pdf = \PDF::loadView('admin.commercial_hold.pdf', $data);
        return $pdf->download($datafor . '.pdf');
    }

    public function exportpdfcomdata(Request $request) {
        $ward = $request->wardid;
        $nid = $request->nid;
        $mobile = $request->mobile;
        $commercialholds = DB::table('commercial_holds')
                ->join('users', 'commercial_holds.user_id', 'users.user_id')
                ->when($ward, function ($query, $ward) {
                    return $query->where('ward_id', 'like', '%' . $ward . '%');
                })
                ->when($nid, function ($query, $nid) {
                    return $query->where('nid', 'like', '%' . $nid . '%');
                })
                ->when($mobile, function ($query, $mobile) {
                    return $query->where('mobile', 'like', '%' . $mobile . '%');
                })
                ->get();
        $data = [
            'all' => $commercialholds,
        ];
        $datafor = date('Y-m-d') . '-' . $ward;
        $pdf = \PDF::loadView('admin.commercial_hold.pdf', $data);
        return $pdf->download($datafor . '.pdf');
    }

    public function activeexportpdfcomdata() {
        $all = DB::table('commercial_holds')
                        ->join('users', 'commercial_holds.user_id', 'users.user_id')
                        ->join('wards', 'commercial_holds.ward_id', 'wards.id')
                        ->join('house_types', 'commercial_holds.type_house', 'house_types.id')
                        ->where('commercial_holds.status', 1)->get();
        if (count($all) == 0) {
            $notification = array(
                'message' => 'Results Not Found To Export!',
                'alert-type' => 'error'
            );
            return redirect('/all-commercial-hold-active')->with($notification);
        }
        $datafor = 'all-' . date('Y-m-d');
        $pdf = \PDF::loadView('admin.commercial_hold.pdf', ['all' => $all]);
        return $pdf->download($datafor . '.pdf');
    }

    public function inactiveexportpdfcomdata() {
        $all = DB::table('commercial_holds')
                        ->join('users', 'commercial_holds.user_id', 'users.user_id')
                        ->join('wards', 'commercial_holds.ward_id', 'wards.id')
                        ->join('house_types', 'commercial_holds.type_house', 'house_types.id')
                        ->where('commercial_holds.status', 0)->get();

        if (count($all) == 0) {
            $notification = array(
                'message' => 'Results Not Found To Export!',
                'alert-type' => 'warning'
            );
            return redirect('/all-commercial-hold-inactive')->with($notification);
        }

        $datafor = 'all-' . date('Y-m-d');
        $pdf = \PDF::loadView('admin.commercial_hold.pdf', ['all' => $all]);
        return $pdf->download($datafor . '.pdf');
    }

}
