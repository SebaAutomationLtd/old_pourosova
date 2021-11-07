<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    //
    public function create()
    {
        $year = date('Y');
        return view('admin.business_hold.create', compact('year'));
    }

    public function store(Request $request)
    {

        $count = DB::table('business_holds')->count() + 1;
        if ($count < 10) {
            $format = "2220" . $request->ward_id . "00";
            $user_id = $format . "" . $count;
        } elseif ($count >= 10 && $count <= 99) {
            $format = "2220" . $request->ward_id . "0";
            $user_id = $format . "" . $count;
        } else {
            $format = "2220" . $request->ward_id;
            $user_id = $format . "" . $count;
        }

        $rules = [

            'ward_id' => 'required',
            'road_moholla' => 'required',
            'institute_name' => 'required',

            'business_type' => 'required',
            'owner_name' => 'required',
            'father_name' => 'required_without:husband_name',
            'husband_name' => 'required_without:father_name',
            'mother_name' => 'required',
            'institute_address' => 'required',
            'owner_current_address' => 'required',
            'owner_permanent_address' => 'required',
            'nid' => 'required_without:birth_certificate',
            'birth_certificate' => 'required_without:nid',
            'mobile' => 'required',
            'last_license_issue_year' => 'required',
            'trade_fee' => 'required',
            //'vat'=>'required',
            'singnboard_tax' => 'required',
            'business_tax' => 'required',
            'other' => 'required',
            'trade_total' => 'required',
            'service_charge_id' => 'required',
            'payment_type' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = array();
        $data['user_id'] = $user_id;
        $data['ward_id'] = $request->ward_id;
        $data['road_moholla'] = $request->road_moholla;
        $data['institute_name'] = $request->institute_name;
        $data['business_type'] = $request->business_type;
        $data['owner_name'] = $request->owner_name;
        $data['father_name'] = $request->father_name;
        $data['husband_name'] = $request->husband_name;
        $data['mother_name'] = $request->mother_name;
        $data['institute_address'] = $request->institute_address;
        $data['owner_current_address'] = $request->owner_current_address;
        $data['owner_permanent_address'] = $request->owner_permanent_address;
        $data['nid'] = $request->nid;
        $data['birth_certificate'] = $request->birth_certificate;
        $data['mobile'] = $request->mobile;
        $data['last_license_issue_year'] = $request->last_license_issue_year;
        $data['trade_fee'] = $request->trade_fee;
        $data['vat'] = $request->vat;
        $data['singnboard_tax'] = $request->singnboard_tax;
        $data['business_tax'] = $request->business_tax;
        $data['other'] = $request->other;
        $data['trade_total'] = $request->trade_total;
        $data['service_charge_id'] = $request->service_charge_id;
        $data['payment_type'] = $request->payment_type;
        $data['status'] = 0;
        $data['added_by'] = 'Frontend';
        

        $image = $request->file('image');
        // if($image_one){
        // 	$image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        //  Image::make($image_one)->resize(270,270)->save('upload/BusinessHolder/'.$image_one_name);
        //$data['image']='upload/BusinessHolder/'.$image_one_name;
        // }

        if ($image) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('upload/Bhold'), $imageName);
            $data['image'] = 'upload/Bhold/' . $imageName;
        }


        DB::table('business_holds')->insert($data);

        $odata = array();
        $odata['name'] = $request->owner_name;
        $odata['user_id'] = $user_id;

        $odata['password'] = bcrypt('12345678');
        $odata['show_password'] = '12345678';

        DB::table('users')->insert($odata);


        $url = "http://premium.mdlsms.com/smsapi";
        $data = [
            "api_key" => "C2000808603de7bf6e9249.14298062",
            "type" => "text",
            "contacts" => $request->mobile,
            "senderid" => "8809612440735",
            "msg" => "Congratulations! You have Successfully Submitted Your Nagorik Sheba Card Application, Sheba Card Request ID {$user_id}
                --lalmonirhat Pourashava-- ",
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
            'messege' => 'Successfully, Business Member Registered',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
