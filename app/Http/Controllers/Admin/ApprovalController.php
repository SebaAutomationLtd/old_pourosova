<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:certificate-approve']);
    }

    public function TradeApproval()
    {
        $all = DB::table('renew_licenses')
            ->join('business_holds', 'renew_licenses.user_id', 'business_holds.user_id')
            ->select('business_holds.*', 'renew_licenses.*')
            ->orderBy('business_holds.id', 'DESC')
            ->get();

        return view('admin.approval.trade_license_approved', compact('all'));
    }

    public function ActiveTradeApproval($id)
    {
        $date = date('d/m/Y');
        DB::table('renew_licenses')
            ->where('id', $id)
            ->update([
                'payment_status' => 1,
                'date' => $date
            ]);
        $notification = array(
            'messege' => 'Successfully, Trade License Has been Approved',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function InactiveTradeApproval($id)
    {
        DB::table('renew_licenses')
            ->where('id', $id)
            ->update(['payment_status' => 0]);
        $notification = array(
            'messege' => 'Successfully, Trade License Has been Inactived',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


}
