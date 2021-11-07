<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;
use Validator;

class BosotController extends Controller
{
    public function create()
    {
        return view('admin.general_member.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'father_name' => 'required_without:husband_name',
            'husband_name' => 'required_without:father_name',
            'mother_name' => 'required',
            'gender' => 'required',
            'martial_status' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'nid' => 'required_without:birth_certificate',
            'birth_certificate' => 'required_without:nid',
            'family_class' => 'required',
            'mobile' => 'required',
            'religion_id' => 'required',
            'ward_id' => 'required',
            'village_id' => 'required',
            'holding_no' => 'required',
            'post_code_id' => 'required',
            'post_office_id' => 'required',
            'type_house' => 'required',
            'occupation_id' => 'required',
            'last_tax_year' => 'required',
            'payment_type' => 'required',
            'biddut' => 'required',
            'sanitation' => 'required',
            'number_room' => 'required',
            'height' => 'required',
            'wide' => 'required',
            'member_male' => 'required',
            'member_female' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user_id = 2;

        $rand = rand(10, 1000);
        $data = array();
        $data['name'] = $request->name;
        $data['user_id'] = $user_id;//
        $data['father_name'] = $request->father_name;//
        $data['husband_name'] = $request->husband_name;//or
        $data['mother_name'] = $request->mother_name;
        $data['gender'] = $request->gender;
        $data['martial_status'] = $request->martial_status;
        $data['day'] = $request->day;
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        $data['nid'] = $request->nid;
        $data['family_class'] = $request->family_class;
        $data['birth_certificate'] = $request->birth_certificate;
        $data['mobile'] = $request->mobile;
        $data['religion_id'] = $request->religion_id;
        $data['ward_id'] = $request->ward_id;
        $data['village_id'] = $request->village_id;
        $data['holding_no'] = $request->holding_no;
        $data['post_code_id'] = $request->post_code_id;
        $data['post_office_id'] = $request->post_office_id;
        $data['type_house'] = $request->type_house;
        $data['monthly_income'] = $request->monthly_income;
        $data['house_year_value'] = $request->house_year_value;
        $data['yearly_vat'] = $request->yearly_vat;
        $data['occupation_id'] = $request->occupation_id;
        $data['last_tax_year'] = $request->last_tax_year;
        $data['service_charge'] = $request->service_charge;
        $data['payment_type'] = $request->payment_type;
        $data['member_male'] = $request->member_male;
        $data['member_female'] = $request->member_female;
        $data['biddut'] = $request->biddut;
        $data['sanitation'] = $request->sanitation;
        $data['number_room'] = $request->number_room;
        $data['height'] = $request->height;
        $data['wide'] = $request->wide;
        $data['status'] = 0;
        $data['added_by'] = 'Front';
        DB::table('general_members')->insert($data);

        $odata = array();
        $odata['name'] = $request->name;
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
            'messege' => 'Successfully, General Member Inserted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function GetVillage($id)
    {
        $count = DB::table('villages')->where('ward_id', $id)->count();
        $data = DB::table('villages')->where('ward_id', $id)->get();
        if ($count == 0) {
            echo "no_data";
        } else {
            ?>
            <option value="" selected="" disabled="">নির্বাচন করুন</option>
            <?php foreach ($data as $row): ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->village_name; ?></option>
            <?php endforeach; ?>
            <?php
        }
    }

    public function GetPostOffice($id)
    {
        $count = DB::table('post_offices')->where('post_code_id', $id)->count();
        $data = DB::table('post_offices')->where('post_code_id', $id)->get();
        if ($count == 0) {
            echo "no_data";
        } else {
            ?>
            <option value="" selected="" disabled="">--নির্বাচন করুন--</option>
            <?php foreach ($data as $row): ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->post_office; ?></option>
            <?php endforeach; ?>
            <?php
        }
    }

    public function GetHouseTaxRate($id)
    {
        $data = DB::table('house_rates')->where('house_type_id', $id)->first();
        echo $data->tax_rate;
    }

}
