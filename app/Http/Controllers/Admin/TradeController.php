<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:tax-rate-setup']);
    }

    public function TradeFee()
    {
        $all = DB::table('trade_licenses')
            ->join('business_types', 'trade_licenses.business_type_id', 'business_types.id')
            ->select('business_types.name', 'trade_licenses.*')
            ->orderBy('trade_licenses.id', 'DESC')
            ->get();
        return view('admin.trade.index', compact('all'));
    }

    public function CreateTrade()
    {
        return view('admin.trade.create');
    }

    public function StoreTrade(Request $request)
    {
        $rules = $request->validate([
            'owner_type' => 'required',
            'business_type_id' => 'required',
            'fee' => 'required',
            //'vat'=>'required',
            'signboard_tax' => 'required',
            'business_tax' => 'required',
            'others' => 'required',
            'online_charge' => 'required',
            //'total'=>'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = array();
        $data['owner_type'] = $request->owner_type;
        $data['business_type_id'] = $request->business_type_id;
        $data['fee'] = $request->fee;
        $data['vat'] = $request->vat;
        $data['signboard_tax'] = $request->signboard_tax;
        $data['business_tax'] = $request->business_tax;
        $data['others'] = $request->others;
        $data['online_charge'] = $request->online_charge;
        $data['total'] = $request->total;
        DB::table('trade_licenses')->insert($data);
        $notification = array(
            'messege' => 'Successfully, Trade License Inserted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteTrade($id)
    {
        DB::table('trades')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Successfully, Trade License Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditTrade($id)
    {
        $edit = DB::table('trade_licenses')->where('id', $id)->first();
        return view('admin.trade.edit', compact('edit'));
    }

    public function UpdateTrade(Request $request, $id)
    {
        $rules = $request->validate([
            'owner_type' => 'required',
            'business_type_id' => 'required',
            'fee' => 'required',
            //'vat'=>'required',
            'signboard_tax' => 'required',
            'business_tax' => 'required',
            'others' => 'required',
            'online_charge' => 'required',
            //'total'=>'required',
        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = array();
        $data['owner_type'] = $request->owner_type;
        $data['business_type_id'] = $request->business_type_id;
        $data['fee'] = $request->fee;
        $data['vat'] = $request->vat;
        $data['signboard_tax'] = $request->signboard_tax;
        $data['business_tax'] = $request->business_tax;
        $data['others'] = $request->others;
        $data['online_charge'] = $request->online_charge;
        $data['total'] = $request->total;
        DB::table('trade_licenses')->where('id', $id)->update($data);
        $notification = array(
            'messege' => 'Successfully, Trade License Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
