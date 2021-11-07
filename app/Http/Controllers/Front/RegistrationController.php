<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RegistrationController extends Controller {
    /*     * *********************************************** Commercial Holding Function ******************************************************* */

    //Homestead Holding Function
    public function homestead() {
        $data = [
            'title' => 'বসতবাড়ী হোল্ডিং নিবন্ধন',
            'wards' => DB::table('wards')->orderBy('id', 'DESC')->get(),
            'post_code' => DB::table('post_codes')->orderBy('id', 'DESC')->get(),
            'housetypes' => DB::table('house_types')->where('status', 1)->get(),
            'occupation' => DB::table('occupations')->where('status', 1)->get(),
        ];
        return view('Front.registrations.homestead', $data);
    }

    //Get Vilage Info

    public function getvillageinfo($id) {
        $count = DB::table('villages')->where('ward_id', $id)->count();
        $data = DB::table('villages')->where('ward_id', $id)->get();
        if ($count == 0) {
            echo "no_data";
        } else {
            echo'<option value="" selected="" disabled="">নির্বাচন করুন</option>';
            foreach ($data as $row) {
                echo'<option value="' . $row->id . '">' . $row->village_name . '</option>';
            }
        }
    }

    public function getpostofficeinfo($id) {
        $count = DB::table('post_offices')->where('post_code_id', $id)->count();
        $data = DB::table('post_offices')->where('post_code_id', $id)->get();

        if ($count == 0) {
            echo "no_data";
        } else {
            echo'<option value="" selected="" disabled="">--নির্বাচন করুন--</option>';
            foreach ($data as $row) {
                echo'<option value="' . $row->id . '">' . $row->post_office . '</option>';
            }
        }
    }

    public function get_house_tax_rate($id) {
        $data = DB::table('house_rates')->where('house_type_id', $id)->first();
        echo $data->tax_rate;
    }

    public function getduplicatebirthnid($data, $number) {
        $niddata = DB::table('general_members')->where(['nid' => $number])->count();
        $birthdata = DB::table('general_members')->where(['birth_certificate' => $number])->count();
        if ($data == 'NID') {
            if ($niddata > 0) {
                $message = 'দুঃখিত, এই এন আই ডি নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        } else {
            if ($birthdata > 0) {
                $message = 'দুঃখিত, এই জন্ম নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }

    public function getduplicatenumber($number) {
        if (strlen($number) != 11) {
            $message = 'মোবাইল নম্বর কমপক্ষে ১১  সংখ্যার হতে হবে !';
        } else {
            $result = DB::table('general_members')->where(['mobile' => $number])->count();
            if ($result > 0) {
                $message = 'এই মোবাইল নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }

    public function savenagorikshebainfo(Request $request) {
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
//        $rand = rand(10, 1000);
        $data = array();
        $data['name'] = $request->name;
        $data['user_id'] = $user_id;
        $data['father_name'] = $request->father_name;
        $data['husband_name'] = $request->husband_name;
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
        $data['length_number'] = $request->length_number;
        $data['width_number'] = $request->width_number;
        $data['number_room'] = $request->number_room;
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
        $data['status'] = 0;

        DB::table('general_members')->insert($data);

        $odata = array();
        $odata['name'] = $request->name;
        $odata['user_id'] = $user_id;
        $odata['role'] = "Bosot Bari Member";
        $odata['password'] = bcrypt('12345678');
        $odata['show_password'] = '12345678';
        DB::table('users')->insert($odata);

        $url = "http://premium.mdlsms.com/smsapi";
        $smsdata = [
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
        curl_setopt($ch, CURLOPT_POSTFIELDS, $smsdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $notification = array(
            'message' => 'সফলভাবে আপনার নাগরিক সেবার তথ্য সংরক্ষণ করা হয়েছে ।',
            'type' => 'success'
        );
        return redirect('/homestead-registration')->with($notification);
    }

    /*
     * *************************************Business Registration Function****************************************
     */

    //Homestead Holding Function
    public function businessregistration() {
        $data = [
            'title' => 'ব্যবসা প্রতিষ্টান নিবন্ধন',
            'wards' => DB::table('wards')->orderBy('id', 'DESC')->get(),
            'post_code' => DB::table('post_codes')->orderBy('id', 'DESC')->get(),
            'housetypes' => DB::table('house_types')->where('status', 1)->get(),
            'occupation' => DB::table('occupations')->where('status', 1)->get(),
        ];
        return view('Front.registrations.business', $data);
    }

    public function getbusinessduplicatebirthnid($data, $number) {
        $niddata = DB::table('business_holds')->where(['nid' => $number])->count();
        $birthdata = DB::table('business_holds')->where(['birth_certificate' => $number])->count();
        if ($data == 'NID') {
            if ($niddata > 0) {
                $message = 'দুঃখিত, এই এন আই ডি নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        } else {
            if ($birthdata > 0) {
                $message = 'দুঃখিত, এই জন্ম নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }

    public function getbusinessduplicatenumber($number) {
        if (strlen($number) != 11) {
            $message = 'মোবাইল নম্বর কমপক্ষে ১১  সংখ্যার হতে হবে !';
        } else {
            $result = DB::table('business_holds')->where(['mobile' => $number])->count();
            if ($result > 0) {
                $message = 'এই মোবাইল নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }

    public function storebusinessholdinfo(Request $request) {
        $count = DB::table('business_holds')->count() + 1;
        if ($count < 10) {
            $format = "2221" . $request->ward_id . "00";
            $user_id = $format . "" . $count;
        } elseif ($count >= 10 && $count <= 99) {
            $format = "2221" . $request->ward_id . "0";
            $user_id = $format . "" . $count;
        } else {
            $format = "2221" . $request->ward_id;
            $user_id = $format . "" . $count;
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
        $data['vat'] = $request->vat;
        $data['service_charge_id'] = $request->service_charge_id;
        $data['payment_type'] = $request->payment_type;
        $data['status'] = 0;

        $image = $request->file('image');

        if ($image) {
            $imagename = date('dmi') . substr(md5(rand()), 0, 10);
            $ext = strtolower($image->getClientOriginalExtension());
            $imagefullname = $imagename . '.' . $ext;
            $uploadpath = 'public/upload/Bhold/';
            $image_url = $uploadpath . $imagefullname;
            \Intervention\Image\Facades\Image::make($image)->resize(200, 200)->save($image_url);
            $data['image'] = $image_url;
        }

        DB::table('business_holds')->insert($data);

        $odata = array();
        $odata['name'] = $request->owner_name;
        $odata['user_id'] = $user_id;
        $odata['role'] = "Business Hold Reg";
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
                --Lalmonirhat Pourashava-- ",
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
            'message' => 'সফলভাবে আপনার ব্যবসায়িক সদস্য পদ নিবন্ধন করা হয়েছে !',
            'type' => 'success'
        );
        return redirect('/business-registration')->with($notification);
    }

    /*     * *********************************************** Commercial Holding Function ******************************************************* */

    //Homestead Holding Function
    public function commercial() {
        $data = [
            'title' => 'বানিজ্যিক হোল্ডিং নিবন্ধন',
            'wards' => DB::table('wards')->orderBy('id', 'DESC')->get(),
            'post_code' => DB::table('post_codes')->orderBy('id', 'DESC')->get(),
            'housetypes' => DB::table('house_types')->where('status', 1)->get(),
            'occupation' => DB::table('occupations')->where('status', 1)->get(),
        ];
        return view('Front.registrations.commercial', $data);
    }

    public function getcomercialduplicatebirthnid($data, $number) {
        $niddata = DB::table('commercial_holds')->where(['nid' => $number])->count();
        $birthdata = DB::table('commercial_holds')->where(['birth_certificate' => $number])->count();
        if ($data == 'NID') {
            if ($niddata > 0) {
                $message = 'দুঃখিত, এই এন আই ডি নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        } else {
            if ($birthdata > 0) {
                $message = 'দুঃখিত, এই জন্ম নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }

    public function getcomercialduplicatenumber($number) {
        if (strlen($number) != 11) {
            $message = 'মোবাইল নম্বর কমপক্ষে ১১  সংখ্যার হতে হবে !';
        } else {
            $result = DB::table('commercial_holds')->where(['mobile' => $number])->count();
            if ($result > 0) {
                $message = 'এই মোবাইল নম্বরটি ইতিমধ্যে নিবন্ধন করা হয়েছে !';
            } else {
                $message = 'No';
            }
        }
        return $message;
    }

    public function storecommercialholdinfo(Request $request) {
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
        $odata['role'] = "Commercial Hold Reg";
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
        return redirect('/commercial-holding')->with($notification);
    }

}
