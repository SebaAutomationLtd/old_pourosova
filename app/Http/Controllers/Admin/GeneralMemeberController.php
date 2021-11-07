<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\GeneralMember;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Validator;
 use URL;

class GeneralMemeberController extends Controller
{
    public function __construct()
    {
    //    $this->middleware('permission:bosot-bari-list|bosot-bari-edit|bosot-bari-delete', ['only' => ['GeneralMember', 'GetInfo']]);
    //    $this->middleware('permission:bosot-bari-edit', ['only' => ['EditMember', 'UpdateMember']]);
    //    $this->middleware('permission:bosot-bari-delete', ['only' => ['DeleteMember']]);
    }

    public function CreateGeneralMember()
    {
        return view('admin.general_member.create');
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


    public function StoreGeneralMember(Request $request)
    {
        $count = DB::table('general_members')->count() + 1;
        if ($count < 10) {
            $format = "2220" . $request->post_code_id . "00";
            $user_id = $format . "" . $count;
        } elseif ($count >= 10 && $count <= 99) {
            $format = "2220" . $request->post_code_id . "0";
            $user_id = $format . "" . $count;
        } else {
            $format = "2220" . $request->post_code_id;
            $user_id = $format . "" . $count;
        }

        $rules = $request->validate([
            'name' => 'required',
            // 'father_name' => 'required_without:husband_name',
            // 'husband_name' => 'required_without:father_name',
            // 'mother_name' => 'required',
            // 'gender' => 'required',
            // 'martial_status' => 'required',
            // 'day' => 'required',
            // 'month' => 'required',
            // 'year' => 'required',
            // 'nid' => 'required_without:birth_certificate',
            // 'birth_certificate' => 'required_without:nid',
            // 'family_class' => 'required',
            // 'mobile' => 'required',
            // 'religion_id' => 'required',
            // 'ward_id' => 'required',
            // 'village_id' => 'required',
            // 'holding_no' => 'required',
            // 'post_code_id' => 'required',
            // 'post_office_id' => 'required',
            // 'type_house' => 'required',
            // 'occupation_id' => 'required',
            // 'last_tax_year' => 'required',
            // 'payment_type' => 'required',
            // 'biddut' => 'required',
            // 'sanitation' => 'required',
            // 'number_room' => 'required',
            // 'height' => 'required',
            // 'wide' => 'required',
            // 'member_male' => 'required',
            // 'member_female' => 'required',

        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
        $data['added_by'] = Auth::user()->user_id;
        DB::table('general_members')->insert($data);

        $odata = array();
        $odata['name'] = $request->name;
        $odata['user_id'] = $user_id;
        $odata['role'] = "Bosot Bari Member";
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

    public function GeneralMember()
    {
        

        $data['all'] = DB::table('general_members')
            ->join('users', 'general_members.user_id', 'users.user_id')
            ->select('users.show_password', 'users.user_id', 'general_members.*')
            ->orderBy('general_members.id', 'DESC')
            ->get();

        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.general_member.index', $data);
    }

    public function DeleteMember($id)
    {
        $get_data = DB::table('general_members')->where('id', $id)->first();
        DB::table('users')->where('user_id', $get_data->user_id)->delete();
        DB::table('general_members')->where('id', $id)->delete();


        $notification = array(
            'messege' => 'Successfully, General Member Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditMember($id)
    {
        $year = date('Y');
        $edit = DB::table('general_members')->where('id', $id)->first();
        return view('admin.general_member.edit', compact('edit', 'year'));
    }

    public function ActiveMember($id)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $get_data = DB::table('general_members')->where('id', $id)->first();
        DB::table('general_members')
            ->where('id', $id)
            ->update([
                'status' => '1',
                'activate_by' => Auth::user()->id,
                'active_at' => $current_date_time
            ]);

        $url = "http://premium.mdlsms.com/smsapi";
        $data = [
            "api_key" => "C2000808603de7bf6e9249.14298062",
            "type" => "text",
            "contacts" => $get_data->mobile,
            "senderid" => "8809612440735",
            "msg" => "Your Nagorik Sheba Card No. {$get_data->user_id} Active. Nagorik Sheba Card Charge BDT {$get_data->service_charge} Tk. Paid Successfull. Payment by Cash",
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
            'messege' => "Successfully, Bosto Bari Member's Status Updated",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function InactiveMember($id)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        DB::table('general_members')
            ->where('id', $id)
            ->update([
                'status' => '0',
                'deactive_by' => Auth::user()->id,
                'deactive_at' => $current_date_time
            ]);

        $notification = array(
            'messege' => "Successfully, Bosto Bari Member's Status Updated",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function UpdateMember(Request $request, $id)
    {
        $get_data = DB::table('general_members')->where('id', $id)->first();

        $rules = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'father_name' => 'required',
            'husband_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'martial_status' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'nid' => 'required',
            'family_class' => 'required',
            'birth_certificate' => 'required',
            'mobile' => 'required',
            'religion_id' => 'required',
            'ward_id' => 'required',
            'village_id' => 'required',
            'holding_no' => 'required',
            'post_code_id' => 'required',
            'post_office_id' => 'required',
            'type_house' => 'required',
            'monthly_income' => 'required',
            'house_year_value' => 'required',
            'yearly_vat' => 'required',
            'occupation_id' => 'required',
            'last_tax_year' => 'required',
            'service_charge' => 'required',
            'payment_type' => 'required',
            'member_male' => 'required',
            'member_female' => 'required',
            'biddut' => 'required',
            'sanitation' => 'required',
            'height' => 'required',
            'wide' => 'required'

        ]);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array();
        $data['name'] = $request->name;
        $data['user_id'] = $get_data->user_id;
        $data['father_name'] = $request->father_name;
        $data['husband_name'] = $request->husband_name;
        $data['mother_name'] = $request->mother_name;
        $data['gender'] = $request->gender;
        $data['martial_status'] = $request->martial_status;
        $data['day'] = $request->day;
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        $data['nid'] = $request->nid;
        $data['birth_certificate'] = $request->birth_certificate;
        $data['family_class'] = $request->family_class;
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
        $data['status'] = $get_data->status;
        DB::table('general_members')->where('id', $id)->update($data);


        $notification = array(
            'messege' => 'Successfully, General Member Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function GetInfo($id)
    {
        $member = DB::table('general_members')
            ->join('users', 'general_members.user_id', 'users.user_id')
            ->select('users.show_password', 'general_members.*')
            ->where('general_members.id', $id)
            ->first();
        ?>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control name" placeholder="Name"
                           value="<?php echo $member->name; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="text" name="user_id" id="user_id" class="form-control user_id" placeholder="User ID"
                           value="<?php echo $member->user_id; ?>">
                </div>
            </div>
            <input type="hidden" name="member_id" class="member_id" value="<?php echo $member->id; ?>">
            <div class="form-group col-md-6">
                <label for="password">password</label>
                <input type="text" name="password" id="password" class="form-control password" placeholder="Password"
                       value="<?php echo $member->show_password; ?>">
            </div>
        </div>
        <?php
    }

    public function UpdateMemberInfo(Request $request)
    {


        // $get_data = DB::table('general_members')->where('id',$request->id)->first();

        // $name = $request->name;
        // $password = $request->password;
        // $user_id = $request->user_id;
        // DB::table('users')
        //    ->where('user_id',$get_data->user_id)
        //    ->update([
        //       'name' => $name,
        //       'show_password' => $password,
        //       'password' => bcrypt($password),
        //       'user_id' =>  $user_id
        //    ]);

        // DB::table('general_members')
        //    ->where('user_id',$get_data->user_id)
        //    ->update([
        //        'name' => $name,
        //        'user_id'    => $user_id
        //    ]);


        $get_data = DB::table('general_members')->where('id', $request->id)->first();

        //   $users = DB::table('users')->where('user_id',$request->user_id)->first();

        $name = $request->name;
        $password = $request->password;
        $user_id = $get_data->user_id;
        DB::table('users')
            ->where('user_id', $get_data->user_id)
            ->update([
                'name' => $name,
                'show_password' => $password,
                'password' => bcrypt($password),
                'user_id' => $request->user_id
            ]);

        DB::table('general_members')
            ->where('id', $get_data->id)
            ->update([
                'name' => $name,
                'user_id' => $request->user_id
            ]);


    }

    public function CheckMobileNumber(Request $request)
    {
        $count = DB::table('general_members')->where('mobile', $request->mobile)->count();
        if ($count > 0) {
            echo "data_exist";
        }
    }

    public function CheckBirthNid(Request $request)
    {
        if ($request->attr == 'birth_certificate') {
            $count_birth_certificate = DB::table('general_members')->where('birth_certificate', $request->birth_nid)->count();
            if ($count_birth_certificate > 0) {
                echo "birth_exist";
            }
        } elseif ($request->attr == 'nid') {
            $count_nid = DB::table('general_members')->where('nid', $request->birth_nid)->count();
            if ($count_nid > 0) {
                echo "nid_exist";
            }
        }
    }


    public function GeneralMemberActive()
    {
        //   $data= DB::table('general_members')
        //     ->join('users', 'general_members.user_id', 'users.user_id')
        //     ->select('users.show_password', 'users.user_id', 'general_members.*')
        //     ->orderBy('general_members.id', 'DESC')
        //     ->where('general_members.status', 1)
        //     ->get();

        //  $wards = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        // return view('admin.general_member.active_member',compact('data','wards'));
        $data['all'] = DB::table('general_members')
            ->join('users', 'general_members.user_id', 'users.user_id')
            ->select('users.show_password', 'users.user_id', 'general_members.*')
            ->orderBy('general_members.id', 'DESC')
            ->where('general_members.status', 1)
            ->get();

        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.general_member.index', $data);
    }

    public function GeneralMemberInactive()
    {
        //   $data = DB::table('general_members')
        //     ->join('users', 'general_members.user_id', 'users.user_id')
        //     ->select('users.show_password', 'users.user_id', 'general_members.*')
        //     ->orderBy('general_members.id', 'DESC')
        //     ->where('general_members.status', 0)
        //     ->get();

        // return view('admin.general_member.inactive_member',compact('data'));
        $data['all'] = DB::table('general_members')
            ->join('users', 'general_members.user_id', 'users.user_id')
            ->select('users.show_password', 'users.user_id', 'general_members.*')
            ->orderBy('general_members.id', 'DESC')
            ->where('general_members.status', 0)
            ->get();

        $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        return view('admin.general_member.index', $data);
    }


    public function GeneralMemberFilter(Request $request)
    {
        // if ($request->ward == '' && $request->holding_no == '' && $request->village == '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->orderBy('general_members.id', 'DESC')
        //         ->get();
        // }
        // else if ($request->ward == '' && $request->holding_no == '' && $request->village != '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->where('general_members.village_id', $request->village)
        //         ->orderBy('general_members.id', 'DESC')
        //         ->get();
        // }

        // else if ($request->ward != '' && $request->holding_no == '' &&  $request->village == '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->join('wards', 'general_members.ward_id', 'wards.id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->orderBy('general_members.id', 'DESC')
        //         ->where('wards.ward_no', $request->ward)
        //         ->get();
        // }
        // else if ($request->ward != '' && $request->holding_no == '' &&  $request->village != '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->join('wards', 'general_members.ward_id', 'wards.id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->orderBy('general_members.id', 'DESC')
        //         ->where('wards.ward_no', $request->ward)
        //         ->where('general_members.village_id', $request->village)
        //         ->get();
        // }

        // else if ($request->ward != '' && $request->holding_no != '' &&  $request->village == '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->join('wards', 'general_members.ward_id', 'wards.id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->orderBy('general_members.id', 'DESC')
        //         ->where('wards.ward_no', $request->ward)
        //         ->where('general_members.holding_no', $request->holding_no)
        //         ->orWhere('general_members.mobile', $request->holding_no)
        //         ->orWhere('general_members.nid', $request->holding_no)
        //         ->orWhere('general_members.birth_certificate', $request->holding_no)
        //         ->get();
        // }

        // else if ($request->ward != '' && $request->holding_no != '' &&  $request->village != '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->join('wards', 'general_members.ward_id', 'wards.id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->orderBy('general_members.id', 'DESC')
        //         ->where('wards.ward_no', $request->ward)
        //         ->where('general_members.holding_no', $request->holding_no)
        //         ->orWhere('general_members.mobile', $request->holding_no)
        //         ->orWhere('general_members.nid', $request->holding_no)
        //         ->orWhere('general_members.birth_certificate', $request->holding_no)
        //         ->where('general_members.village_id', $request->village)
        //         ->get();
        // }


        // else if ($request->ward == '' && $request->holding_no != ''  &&  $request->village == '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->join('wards', 'general_members.ward_id', 'wards.id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->orderBy('general_members.id', 'DESC')
        //         ->where('general_members.holding_no', $request->holding_no)
        //         ->orWhere('general_members.mobile', $request->holding_no)
        //         ->orWhere('general_members.nid', $request->holding_no)
        //         ->orWhere('general_members.birth_certificate', $request->holding_no)
        //         ->get();
        // }
        // else if ($request->ward == '' && $request->holding_no != ''  &&  $request->village != '') {
        //     $data['all'] = DB::table('general_members')
        //         ->join('users', 'general_members.user_id', 'users.user_id')
        //         ->join('wards', 'general_members.ward_id', 'wards.id')
        //         ->select('users.show_password', 'users.user_id', 'general_members.*')
        //         ->orderBy('general_members.id', 'DESC')
        //         ->where('general_members.holding_no', $request->holding_no)
        //         ->orWhere('general_members.mobile', $request->holding_no)
        //         ->orWhere('general_members.nid', $request->holding_no)
        //         ->orWhere('general_members.birth_certificate', $request->holding_no)
        //         ->where('general_members.village_id', $request->village)
        //         ->get();
        // }

        // $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();

        // return view('new_bosot_index', $data);

        echo "<pre>";
        print_r($request->all());
    }

    public function villageByWord($id)
    {
        $dat = DB::table('villages')->where('ward_id', $id)->get();
        return json_encode($dat);
    }


    public function GetVillageWard(Request $request)
    {
        $ward_id = $request->ward_id;
        $data = DB::table('villages')
            ->where('ward_id', $ward_id)
            ->orderBy('id', 'DESC')
            ->get();
        ?>

        <select style="width: 70px;" style="border-radius: 0;"
                name="village_id" id="village_id"
                class="form-control form-control-sm">
            <option value="" selected="" disabled="">গ্রাম
            </option>

            <?php foreach ($data as $row): ?>

                <option value="<?php echo $row->id ?>"><?php echo $row->village_name; ?></option>
            <?php endforeach; ?>

        </select>


        <?php
    }

    public function SearchGeneralMember(Request $request)
    {
        // $nid_count = DB::table('general_members')->where('nid', $birth_nid)->count();

        // $b_count = DB::table('general_members')->where('birth_certificate', $birth_nid)->count();


        if ($request->nid && $request->mobile) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.mobile', $request->mobile)
                ->where('general_members.nid', $request->nid)
                ->orderBy('general_members.id', 'DESC')
                ->get();

        } elseif ($request->nid) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.nid', $request->nid)
                ->orderBy('general_members.id', 'DESC')
                ->get();
        } elseif ($request->mobile) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.mobile', $request->mobile)
                ->orderBy('general_members.id', 'DESC')
                ->get();
        } elseif ($request->ward_id && $request->village_id) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.ward_id', $request->ward_id)
                ->where('general_members.village_id', $request->village_id)
                ->orderBy('general_members.id', 'DESC')
                ->get();
        } else {
            $all = GeneralMember::where('ward_id', $request->ward_id)
                ->orWhere('village_id', $request->village_id)
                ->orWhere('mobile', $request->mobile)
                ->orWhere('nid', $request->birth_nid)
                ->orWhere('holding_no', $request->holding_no)
                ->orderBy('id', 'DESC')
                ->get();
        }

        echo "<pre>";
        print_r($all);
        //return view('admin.general_member.index', compact('all'));


    }

    public function DownloadBosotbari()
    {
        $all = DB::table('general_members')->orderBy('id', 'DESC')->get();
        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
              crossorigin="anonymous">
        <table class="table">
            <thead>
            <tr>
                <th>SL</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Mobile</th>


                <th>Status</th>

            </tr>
            </thead>

            <tbody>
            <?php foreach ($all as $key => $row): ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $row->user_id; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->mobile; ?></td>
                    <?php if ($row->status == '0'): ?>
                        <td>
                            Inactive
                        </td>
                    <?php else: ?>
                        <td>
                            Active
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }

    public function MemCount()
    {
        $data = DB::table('general_members')->where('ward_id', 11)->get();
        echo "<pre>";
        print_r($data);
    }


    public function FamilyClass()
    {
        $all = DB::table('general_members')->where('family_class', '!=', NULL)->get();
        return view('admin.general_member.all_family_class', compact('all'));
    }

    public function FilterFamilyClass(Request $request)
    {

        if ($request->ward_id && $request->village_id && $request->family_class) {
            $all = DB::table('general_members')
                ->where('family_class', '!=', NULL)
                ->where('ward_id', $request->ward_id)
                ->where('village_id', $request->village_id)
                ->where('family_class', $request->family_class)
                ->get();
        } elseif ($request->ward_id && $request->village_id) {
            $all = DB::table('general_members')
                ->where('family_class', '!=', NULL)
                ->where('ward_id', $request->ward_id)
                ->where('village_id', $request->village_id)
                ->get();

        } elseif ($request->ward_id && $request->family_class) {
            $all = DB::table('general_members')
                ->where('family_class', '!=', NULL)
                ->where('ward_id', $request->ward_id)
                ->where('family_class', $request->family_class)
                ->get();
        } elseif ($request->ward_id) {
            $all = DB::table('general_members')
                ->where('family_class', '!=', NULL)
                ->where('ward_id', $request->ward_id)
                ->get();
        } elseif ($request->family_class) {
            $all = DB::table('general_members')
                ->where('family_class', '!=', NULL)
                ->where('family_class', $request->family_class)
                ->get();
        }


        return view('admin.general_member.all_family_class', compact('all'));
    }

    public function NewBosotAllData()
    {
        //   $data['all'] = DB::table('general_members')
        //     ->join('users', 'general_members.user_id', 'users.user_id')
        //     ->select('users.show_password', 'users.user_id', 'general_members.*')
        //     ->orderBy('general_members.id', 'DESC')
        //     ->get();

        // $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
        $all = DB::table('general_members')
            ->join('users', 'general_members.user_id', 'users.user_id')
            ->select('users.show_password', 'users.user_id', 'general_members.*')
            ->orderBy('general_members.id', 'DESC')
            ->get();
        ?>
        <?php foreach ($all as $row): ?>
        <p><?php echo $row->name; ?></p>
    <?php endforeach; ?>
        <?php
        //return view('general_load_data', compact($all));
    }

    public function NewBosotIndex()
    {
        return view('new_bosot_index');
    }

    public function BosotSearchResult(Request $request)
    {
        // if($request->ward_id && $request->village_id && $request->mobile && $request->nid && $request->holding_no)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)
        //       ->where('general_members.village_id',$request->village_id)
        //       ->where('general_members.mobile',$request->mobile)
        //       ->where('general_members.nid',$request->nid)
        //       ->where('general_members.holding_no',$request->holding_no)

        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }
        // elseif($request->ward_id && $request->village_id && $request->mobile && $request->nid)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)
        //       ->where('general_members.village_id',$request->village_id)
        //       ->where('general_members.mobile',$request->mobile)
        //       ->where('general_members.nid',$request->nid)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }
        // elseif($request->ward_id && $request->village_id && $request->mobile)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)
        //       ->where('general_members.village_id',$request->village_id)
        //       ->where('general_members.mobile',$request->mobile)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        // elseif($request->ward_id && $request->village_id)
        // {
        //      $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)
        //       ->where('general_members.village_id',$request->village_id)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }
        // elseif($request->ward_id && $request->mobile)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)
        //       ->where('general_members.mobile',$request->mobile)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        // elseif($request->ward_id && $request->nid)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)
        //       ->where('general_members.nid',$request->nid)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        // elseif($request->ward_id && $request->holding_no)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)
        //       ->where('general_members.nid',$request->holding_no)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        // elseif($request->ward_id)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->ward_id)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        // elseif($request->nid)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->nid)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        // elseif($request->mobile)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->mobile)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        // elseif($request->holding_no)
        // {
        //     $all = DB::table('general_members')
        //       ->join('users', 'general_members.user_id', 'users.user_id')
        //       ->select('general_members.*', 'users.*')
        //       ->where('general_members.ward_id',$request->holding_no)


        //       ->get();
        //       return view('bosot_search_result', compact('all'));
        // }

        if ($request->nid && $request->mobile) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.mobile', $request->mobile)
                ->where('general_members.nid', $request->nid)
                ->orderBy('general_members.id', 'DESC')
                ->get();

        } elseif ($request->nid) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.nid', $request->nid)
                ->orderBy('general_members.id', 'DESC')
                ->get();
        } elseif ($request->mobile) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.mobile', $request->mobile)
                ->orderBy('general_members.id', 'DESC')
                ->get();
        } elseif ($request->ward_id && $request->village_id) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.ward_id', $request->ward_id)
                ->where('general_members.village_id', $request->village_id)
                ->orderBy('general_members.id', 'DESC')
                ->get();
        } elseif ($request->ward_id) {
            $all = DB::table('general_members')
                ->join('users', 'general_members.user_id', 'users.user_id')
                ->select('users.show_password', 'general_members.*')
                ->where('general_members.ward_id', $request->ward_id)
                ->orderBy('general_members.id', 'DESC')
                ->get();
        } else {
            $all = GeneralMember::where('ward_id', $request->ward_id)
                ->orWhere('village_id', $request->village_id)
                ->orWhere('mobile', $request->mobile)
                ->orWhere('nid', $request->birth_nid)
                ->orWhere('holding_no', $request->holding_no)
                ->orderBy('id', 'DESC')
                ->get();
        }
        return view('bosot_search_result', compact('all'));
    }

}
