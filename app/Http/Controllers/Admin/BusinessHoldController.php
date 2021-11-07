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
class BusinessHoldController extends Controller
{
  public function __construct()
  {
      // $this->middleware('admin');
  }
    public function BusinessHold()
    {
        $year = date('Y');
    	return view('admin.business_hold.create', compact('year'));
    }

    public function StoreBusinessHold(Request $request)
    {
       $count = DB::table('business_holds')->count()+1;
       if($count < 10){
       	   $format = "2220".$request->ward_id."00";
       	   $user_id = $format."".$count;
       }
       elseif($count >=10 && $count<=99){
       	  $format = "2220".$request->ward_id."0";
       	   $user_id = $format."".$count;
       }
       else{
       	  $format = "2220".$request->ward_id;
       	   $user_id = $format."".$count;
       }

       $rules = $request->validate([
        'user_id'=>'required',
        'ward_id'=>'required',
        'road_moholla'=>'required',
        'institute_name'=>'required',

        'business_type'=>'required',
        'owner_name'=>'required',
        'father_name' => 'required_without:husband_name',
        'husband_name' => 'required_without:father_name',
        'mother_name'=>'required',
        'institute_address'=>'required',
        'owner_current_address'=>'required',
        'owner_permanent_address'=>'required',
        'nid' => 'required_without:birth_certificate',
        'birth_certificate' => 'required_without:nid',
        'mobile'=>'required',
        'last_license_issue_year'=>'required',
        'trade_fee'=>'required',
        //'vat'=>'required',
        'singnboard_tax'=>'required',
        'business_tax'=>'required',
        'other'=>'required',
        'trade_total'=>'required',
        'service_charge_id'=>'required',
        'payment_type'=>'required',
    ]);

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
      $data['added_by'] = Auth::user()->user_id;

        $image = $request->file('image');
        // if($image_one){
        // 	$image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
	       //  Image::make($image_one)->resize(270,270)->save('upload/BusinessHolder/'.$image_one_name);
	       //$data['image']='upload/BusinessHolder/'.$image_one_name;
        // }

        if($image){
            $imageName = time().'.'.$request->image->extension();

          $request->image->move(public_path('upload/Bhold'), $imageName);
           $data['image'] = 'upload/Bhold/'.$imageName;
        }


	     DB::table('business_holds')->insert($data);

         $odata = array();
         $odata['name'] = $request->owner_name;
         $odata['user_id'] =  $user_id;
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


         $notification=array(
                     'messege'=>'Successfully, Business Member Registered',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    }

    public function CheckMobileHold(Request $request)
    {

    	$count = DB::table('business_holds')->where('mobile',$request->mobile)->count();
    	if($count > 0)
    	{
    		echo "data_exist";
    	}

    }

    public function CheckBirthNidHold(Request $request)
    {
    	if($request->attr == 'birth_certificate'){
            $count_birth_certificate = DB::table('business_holds')->where('birth_certificate',$request->birth_nid)->count();
            if($count_birth_certificate > 0){
            	echo "birth_exist";
            }

         }
         elseif($request->attr == 'nid'){
            $count_nid = DB::table('business_holds')->where('nid',$request->birth_nid)->count();
            if($count_nid > 0){
                echo "nid_exist";
            }
         }
    }

    public function AllBusinessHold()
    {
    // 	$all = DB::table('business_holds')
    // 	   ->join('wards', 'business_holds.ward_id', 'wards.id')
    // 	   ->join('users', 'business_holds.user_id', 'users.user_id')
    // 	   ->select('wards.ward_no','business_holds.*', 'users.show_password')
    // 	   ->orderBy('business_holds.id', 'DESC')
    // 	    ->get();
    // 	return view('admin.business_hold.index', compact('all'));
    $data['all'] = DB::table('business_holds')
    	   ->join('wards', 'business_holds.ward_id', 'wards.id')
    	   ->join('users', 'business_holds.user_id', 'users.user_id')
    	   ->select('wards.ward_no','business_holds.*', 'users.name', 'users.show_password')
    	   ->orderBy('business_holds.id', 'DESC')
    	   ->get();

		$data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();

    	return view('admin.business_hold.index', $data);
    }

    public function EditBusinessHold($id)
    {
    	$year = date('Y');
    	$edit = DB::table('business_holds')->where('id',$id)->first();
    	return view('admin.business_hold.edit', compact('edit', 'year'));
    }

    public function UpdateBusinessHold(Request $request,$id)
    {
    	$get_data = DB::table('business_holds')->where('id',$id)->first();

      $rules = $request->validate([
        'user_id'=>'required',
        'ward_id'=>'required',
        'road_moholla'=>'required',
        'institute_name'=>'required',

        'business_type'=>'required',
        'owner_name'=>'required',
        'father_name'=>'required',
        'husband_name'=>'required',
        'mother_name'=>'required',
        'institute_address'=>'required',
        'owner_current_address'=>'required',
        'owner_permanent_address'=>'required',
        'nid'=>'required',
        'birth_certificate'=>'required',
        'mobile'=>'required',
        'last_license_issue_year'=>'required',
        'trade_fee'=>'required',
        //'vat'=>'required',
        'singnboard_tax'=>'required',
        'business_tax'=>'required',
        'other'=>'required',
        'trade_total'=>'required',
        'service_charge_id'=>'required',
        'payment_type'=>'required',
    ]);

      $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

    	$data = array();
    	$data['user_id'] = $get_data->user_id;
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
      $data['status'] = $get_data->status;

        $image = $request->file('image');
        // if($image_one){
        //   $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        //         Image::make($image_one)->resize(270,270)->save('upload/BusinessHolder/'.$image_one_name);
        //         $data['image']='upload/BusinessHolder/'.$image_one_name;
        //       File::delete($get_data->image);
        // }
        // else{
        //   $data['image'] = $get_data->image;
        // }


        if($image){
           $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('upload/Bhold/'), $imageName);
        $data['image'] = 'upload/Bhold/'.$imageName;
        }
        else{
           $data['image'] =  $get_data->image;
        }

        DB::table('business_holds')->where('id',$id)->update($data);


        $notification=array(
                     'messege'=>'Successfully, Business Member Info Updated',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    }

    public function RemoveBusinessHold($id)
    {
    	$get_data = DB::table('business_holds')->where('id',$id)->first();
        DB::table('business_holds')->where('id',$id)->update([
        	'image' => NULL
        ]);
       $file_path = $get_data->image;
       unlink($file_path);
       $notification=array(
                     'messege'=>'Successfully, Business Member Image has been Deleted',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    }

    public function DeleteBusinessHold($id)
    {

    	$get_data = DB::table('business_holds')->where('id',$id)->first();

    	  DB::table('business_holds')->where('id',$id)->delete();



      DB::table('users')->where('user_id',$get_data->user_id)->delete();

    	$notification=array(
                     'messege'=>'Successfully, Business Member Deleted',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);

    }

    public function ActiveBusinessHold($id)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
      $get_data = DB::table("business_holds")->where('id',$id)->first();
    	DB::table('business_holds')
    	    ->where('id',$id)
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
                "msg" => "Your Nagorik Sheba Card No. {$get_data->user_id} Active. Nagorik Sheba Card Charge BDT {$get_data->service_charge_id} Tk. Paid Successfull. Payment by Cash",
              ];
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, 1);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              $response = curl_exec($ch);
              curl_close($ch);


    	$notification=array(
                     'messege'=>"Successfully, Business Member's Status Actived",
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);

    }

    public function InactiveBusinessHold($id)
    {
         $current_date_time = Carbon::now()->toDateTimeString();
    	DB::table('business_holds')
    	    ->where('id',$id)
    	    ->update([
    	    	'status' => 0,
    	    	'deactive_by' => Auth::user()->id,
    	    	'deactive_at' => $current_date_time
    	    ]);


    	$notification=array(
                     'messege'=>"Successfully, Business Member's Status Inactived",
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    }

    public function GetBusinessHold($id)
    {
    	$member = DB::table('business_holds')
    	       ->join('users', 'business_holds.user_id', 'users.user_id')
    	       ->select('users.show_password', 'business_holds.*')
    	      ->where('business_holds.id',$id)
    	       ->first();
    	?>

    	<div class="row">



      		<div class="col-sm-6">
      		  <div class="form-group">
	          <label for="name">Name</label>
	          <input type="text" name="name" id="name" class="form-control name" placeholder="Name" value="<?php echo $member->owner_name; ?>">
	         </div>


	         </div>

	         <div class="col-sm-6">
	         	<div class="form-group">
	          <label for="user_id">User ID</label>
	          <input type="text" name="user_id" id="user_id" class="form-control user_id" placeholder="User ID"  value="<?php echo $member->user_id; ?>">
	         </div>

      		</div>

      		<input type="hidden" name="member_id" class="member_id" value="">


	        <div class="col-sm-12">
	         	<div class="form-group">
	          <label for="password">password</label>
	          <input type="text" name="password" id="password" class="form-control password" placeholder="Password" value="<?php echo $member->show_password; ?>">
	         </div>

      	  </div>

      	</div>
      	<button type="submit" class="btn btn-primary info-update" data-id="<?php echo $member->id; ?>">Save Change</button>
    	<?php
    }

    public function UpdateBusinessInfo(Request $request)
    {
    	$get_data = DB::table('business_holds')->where('id',$request->id)->first();
    	$name = $request->name;
    	$password = $request->password;
    	$user_id = $request->user_id;
    	DB::table('users')
    	   ->where('user_id',$get_data->user_id)
    	   ->update([
    	   	  'name' => $name,
    	   	  'show_password' => $password,
    	   	  'password' => bcrypt($password),
    	   	  'user_id' =>  $user_id
    	   ]);

    	DB::table('business_holds')
    	   ->where('user_id',$get_data->user_id)
    	   ->update([
    	   	   'owner_name' => $name,
    	   	   'user_id'    => $user_id
    	   ]);
    }


  public function AllBusinessHoldActive()
    {
    //   $data = DB::table('business_holds')
    //      ->join('wards', 'business_holds.ward_id', 'wards.id')
    //      ->join('users', 'business_holds.user_id', 'users.user_id')
    //      ->select('wards.ward_no','business_holds.*', 'users.name', 'users.show_password')
    //      ->orderBy('business_holds.id', 'DESC')
    //      ->where('business_holds.status', 1)
    //      ->get();

    //   return view('admin.business_hold.active_member',compact('data'));
      $data['all'] = DB::table('business_holds')
    	   ->join('wards', 'business_holds.ward_id', 'wards.id')
    	   ->join('users', 'business_holds.user_id', 'users.user_id')
    	   ->select('wards.ward_no','business_holds.*', 'users.name', 'users.show_password')
    	   ->orderBy('business_holds.id', 'DESC')
		   ->where('business_holds.status', 1)
    	   ->get();

		$data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();

    	return view('admin.business_hold.index', $data);
    }
  public function AllBusinessHoldInactive()
    {
    //   $data = DB::table('business_holds')
    //      ->join('wards', 'business_holds.ward_id', 'wards.id')
    //      ->join('users', 'business_holds.user_id', 'users.user_id')
    //      ->select('wards.ward_no','business_holds.*', 'users.name', 'users.show_password')
    //      ->orderBy('business_holds.id', 'DESC')
    //      ->where('business_holds.status', 0)
    //      ->get();

    //   return view('admin.business_hold.inactive_member',compact('data'));
    $data['all'] = DB::table('business_holds')
    	   ->join('wards', 'business_holds.ward_id', 'wards.id')
    	   ->join('users', 'business_holds.user_id', 'users.user_id')
    	   ->select('wards.ward_no','business_holds.*', 'users.name', 'users.show_password')
    	   ->orderBy('business_holds.id', 'DESC')
		   ->where('business_holds.status', 0)
    	   ->get();

		$data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();

    	return view('admin.business_hold.index', $data);
    }

  public function AllBusinessHoldQuickView($id){
    $member = DB::table('business_holds')
         ->join('wards', 'business_holds.ward_id', 'wards.id')
         ->join('users', 'business_holds.user_id', 'users.user_id')
         ->join('business_types', 'business_holds.business_type', 'business_types.id')
         ->select('wards.ward_no','business_holds.*', 'business_types.name as business_type', 'users.name', 'users.show_password')
         ->orderBy('business_holds.id', 'DESC')
       ->where('business_holds.id', $id)
         ->first();
        ?>
            <div class="d-flex flex-wrap">
                <div class="items w-md-50">
                    <b>ইউজারের নাম : </b> <?php echo $member->name; ?>
                </div>
                <div class="items w-md-50">
                    <b>ইউজার আইডি : </b> <?php echo $member->user_id; ?>
                </div>
                <div class="items w-md-50">
                     <?php if($member->father_name==null) echo '<b>স্বামীর নাম : </b>'. $member->husband_name; else echo '<b>পিতার নাম : </b>' . $member->father_name;  ?>
                </div>
                <div class="items w-md-50">
                    <b>মাতার নাম : </b> <?php echo $member->mother_name; ?>
                </div>
                <div class="items w-md-50">
                    <b>মোবাইল : </b> <?php echo $member->mobile; ?>
                </div>
         <div class="items w-md-50">
                    <b>NID / জন্ম সনদ নং : </b> <?php if($member->nid==null) echo $member->birth_certificate; else echo $member->nid; ?>
                </div>
        <div class="items w-md-50">
                    <b>মালিকের নাম : </b> <?php echo $member->owner_name; ?>
                </div>

        <div class="items w-md-50 w-100" style="width: 100% !important;">
                    <b>মালিকের বর্তমান ঠিকানা : </b> <?php echo $member->owner_current_address; ?>
                </div>
        <div class="items w-md-50" style="width: 100% !important;">
                    <b>মালিকের স্থায়ী ঠিকানা : </b> <?php echo $member->owner_permanent_address; ?>
                </div>

        <div class="items w-md-50">
                    <b>প্রতিষ্ঠানের নাম : </b> <?php echo $member->institute_name; ?>
                </div>
        <div class="items w-md-50">
                    <b>ওয়ার্ড : </b> <?php echo $member->ward_id; ?>
                </div>
        <div class="items w-md-50">
                    <b>রাস্তা / মহল্লা : </b> <?php echo $member->road_moholla; ?>
                </div>
        <div class="items w-md-50"  style="width: 100% !important;">
                    <b>প্রতিষ্ঠানের ঠিকানা : </b> <?php echo $member->institute_address; ?>
                </div>
        <div class="items w-md-50">
                    <b>ব্যবসার ধরণ : </b> <?php echo $member->business_type; ?>
                </div>
        <div class="items w-md-50">
                    <b>লাইসেন্সের মেয়াদ : </b> <?php echo $member->last_license_issue_year; ?>
                </div>
        <div class="items w-md-50">
                    <b>ট্রেড ফি : </b> <?php echo $member->trade_fee; ?>
                </div>
        <div class="items w-md-50">
                    <b>সাইনবোর্ড কর : </b> <?php echo $member->singnboard_tax; ?>
                </div>
        <div class="items w-md-50">
                    <b>ব্যবসার কর : </b> <?php echo $member->business_tax; ?>
                </div>
        <div class="items w-md-50">
                    <b>অন্যান্য : </b> <?php echo $member->other; ?>
                </div>
        <div class="items w-md-50">
                    <b>মোট ফি: </b> <?php echo $member->trade_total; ?>
                </div>
        <div class="items w-md-50">
                    <b>সার্ভিস চার্জ: </b> <?php echo $member->service_charge_id; ?>
                </div>









            </div>
        <?php
  }

  public function AllBusinessHoldFilter(Request $request){

    if($request->ward == '' && $request->mobile == ''){
      $data['all'] = DB::table('business_holds')
      ->join('wards', 'business_holds.ward_id', 'wards.id')
      ->join('users', 'business_holds.user_id', 'users.user_id')
      ->select('wards.ward_no','business_holds.*', 'users.name' , 'users.show_password')
      ->orderBy('business_holds.id', 'DESC')
       ->get();
    }
    else if($request->ward == '' && $request->mobile != ''){
      $data['all'] = DB::table('business_holds')
      ->join('users', 'business_holds.user_id', 'users.user_id')
      ->select('business_holds.*', 'users.name' , 'users.show_password')
      ->where('business_holds.nid', $request->mobile)
      ->orWhere('business_holds.mobile', $request->mobile)
       ->orWhere('business_holds.birth_certificate', $request->mobile)
      ->orderBy('business_holds.id', 'DESC')
       ->get();

    }
    else if($request->ward != ''  && $request->mobile == ''){
      $data['all'] = DB::table('business_holds')
         ->join('wards', 'business_holds.ward_id', 'wards.id')
         ->join('users', 'business_holds.user_id', 'users.user_id')
         ->select('wards.ward_no','business_holds.*', 'users.name' , 'users.show_password')
         ->orderBy('business_holds.id', 'DESC')
       ->where('wards.ward_no', $request->ward)
          ->get();
    }
    else if($request->ward != ''  && $request->mobile != ''){
      $data['all'] = DB::table('business_holds')
         ->join('wards', 'business_holds.ward_id', 'wards.id')
         ->join('users', 'business_holds.user_id', 'users.user_id')
         ->select('wards.ward_no','business_holds.*','users.name' , 'users.show_password')
         ->orderBy('business_holds.id', 'DESC')
       ->where('business_holds.nid', $request->mobile)
       ->orWhere('business_holds.birth_certificate', $request->mobile)
      ->orWhere('business_holds.mobile', $request->mobile)
       ->where('wards.ward_no', $request->ward)
          ->get();
    }


    $data['wards'] = DB::table('wards')->orderBy('ward_no', 'asc')->get();
      return view('admin.business_hold.index', $data);
  }

  public function SearchBusinessHold(Request $request)
  {
    //   $all = BusinessHold::where('ward_id', $request->ward_id)

    //                 ->orWhere('mobile', $request->mobile)
    //                  ->orWhere('nid', $request->nid)

    //                 ->get();

      if($request->ward_id){
          $all = DB::table('business_holds')
             ->join('users', 'business_holds.user_id', 'users.user_id')
              ->join('wards', 'business_holds.ward_id', 'wards.id')
             ->select('users.*', 'business_holds.*', 'wards.ward_no')
            ->where('business_holds.ward_id', $request->ward_id)
             ->orderBy('business_holds.id', 'DESC')
             ->get();
      }

      elseif($request->mobile){
          $all = DB::table('business_holds')
             ->join('users', 'business_holds.user_id', 'users.user_id')
             ->join('wards', 'business_holds.ward_id', 'wards.id')
             ->select('users.*', 'business_holds.*', 'wards.ward_no')
            ->where('business_holds.mobile', $request->mobile)
             ->orderBy('business_holds.id', 'DESC')
             ->get();
      }

      elseif($request->nid){
          $all = DB::table('business_holds')
             ->join('users', 'business_holds.user_id', 'users.user_id')
            ->join('wards', 'business_holds.ward_id', 'wards.id')
             ->select('users.*', 'business_holds.*', 'wards.ward_no')
            ->where('business_holds.nid', $request->nid)
             ->orderBy('business_holds.id', 'DESC')
             ->get();
      }
      elseif($request->ward_id && $request->mobile){
          $all = DB::table('business_holds')
             ->join('users', 'business_holds.user_id', 'users.user_id')
             ->join('wards', 'business_holds.ward_id', 'wards.id')
             ->select('users.*', 'business_holds.*', 'wards.ward_no')
            ->where('business_holds.ward_id', $request->ward_id)
            ->where('business_holds.mobile', $request->mobile)
             ->orderBy('business_holds.id', 'DESC')
             ->get();
      }

      elseif($request->ward_id && $request->nid){
          $all = DB::table('business_holds')
             ->join('users', 'business_holds.user_id', 'users.user_id')
             ->join('wards', 'business_holds.ward_id', 'wards.id')
             ->select('users.*', 'business_holds.*', 'wards.ward_no')
            ->where('business_holds.ward_id', $request->ward_id)
            ->where('business_holds.nid', $request->nid)
             ->orderBy('business_holds.id', 'DESC')
             ->get();
      }

      elseif($request->ward_id && $request->nid && $request->mobile){
          $all = DB::table('business_holds')
             ->join('users', 'business_holds.user_id', 'users.user_id')
             ->join('wards', 'business_holds.ward_id', 'wards.id')
             ->select('users.*', 'business_holds.*', 'wards.ward_no')
            ->where('business_holds.ward_id', $request->ward_id)
            ->where('business_holds.nid', $request->nid)
            ->where('business_holds.mobile', $request->mobile)
             ->orderBy('business_holds.id', 'DESC')
             ->get();
      }
      elseif($request->mobile && $request->nid){
          $all = DB::table('business_holds')
             ->join('users', 'business_holds.user_id', 'users.user_id')
             ->join('wards', 'business_holds.ward_id', 'wards.id')
             ->select('users.*', 'business_holds.*', 'wards.ward_no')

            ->where('business_holds.nid', $request->nid)
            ->where('business_holds.mobile', $request->mobile)
             ->orderBy('business_holds.id', 'DESC')
             ->get();
      }

    return view('admin.business_hold.index', compact('all'));
  }

  public function DownloadBusiness()
  {
    $all = DB::table('business_holds')->orderBy('id', 'DESC')->get();
       ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
          <?php foreach($all as $key=>$row): ?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $row->user_id; ?></td>
              <td><?php echo $row->owner_name; ?></td>
              <td><?php echo $row->mobile; ?></td>
               <?php if($row->status == '0'): ?>
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
}
