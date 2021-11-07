<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommercialController extends Controller
{
    //
    public function create()
    {
        $data = [
            'title' => 'বানিজ্যিক হোল্ডিং নিবন্ধন',
            'wards' => DB::table('wards')->orderBy('id', 'DESC')->get(),
            'post_code' => DB::table('post_codes')->orderBy('id', 'DESC')->get(),
            'housetypes' => DB::table('house_types')->where('status', 1)->get(),
            'occupation' => DB::table('occupations')->where('status', 1)->get(),
        ];
        return view('Front.registrations.commercial', $data);
    }

    public function store(Request $request)
    {
        $count = DB::table('commercial_holds')->count() + 1;
        if ($count < 10) {
            $format = "2222" . $request->ward_id . "00";
            $user_id = $format . "" . $count;
        } elseif ($count >= 10 && $count <= 99) {
            $format = "2222" . $request->ward_id . "0";
            $user_id = $format . "" . $count;
        } else {
            $format = "2222" . $request->ward_id;
            $user_id = $format . "" . $count;
        }
        $data = array();
        $data['user_id'] = $user_id;
        $data['hold_type'] = $request->hold_type;
        $data['owner_name'] = $request->owner_name;
        $data['father_name'] = $request->father_name;
        $data['husband_name'] = $request->husband_name;
        $data['dob'] = $request->day . '/' . $request->month . '/' . $request->year;
        $data['ward_id'] = $request->ward_id;
        $data['holding_no'] = $request->holding_no;
        $data['birth_certificate'] = $request->birth_certificate;
        $data['nid'] = $request->nid;
        $data['mobile'] = $request->mobile;
        $data['type_house'] = $request->type_house;
        $data['number_room'] = $request->number_room;
        $data['length_number'] = $request->length_number;
        $data['width_number'] = $request->width_number;
        $data['house_year_value'] = $request->house_year_value;
        $data['yearly_vat'] = $request->yearly_vat;
        $data['last_tax_year'] = $request->last_tax_year;
        $data['service_charge'] = $request->service_charge;
        $data['payment_type'] = $request->payment_type;
        $data['status'] = 0;

        DB::table('commercial_holds')->insert($data);

        $odata = array();
        $odata['name'] = $request->owner_name;
        $odata['user_id'] = $user_id;

        $odata['password'] = bcrypt('12345678');
        $odata['show_password'] = '12345678';

        DB::table('users')->insert($odata);

        $url = "http://premium.mdlsms.com/smsapi";
        $smdata = [
            "api_key" => "C2000808603de7bf6e9249.14298062",
            "type" => "text",
            "contacts" => $request->mobile,
            "senderid" => "8809612440735",
            "msg" => "Congratulations! You have Successfully Submitted Your Nagorik Sheba Card Application, Sheba Card Request ID {$user_id}
                --Lalmonirhat Pourashava-- ",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $smdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
//
        $notification = array(
            'message' => 'সফলভাবে আপনার ব্যবসায়িক সদস্য পদ নিবন্ধন করা হয়েছে !',
            'type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
