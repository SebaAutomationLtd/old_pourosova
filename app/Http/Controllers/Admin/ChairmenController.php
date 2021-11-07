<?php

namespace App\Http\Controllers\Admin;

use DB;
use File;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Model\Chairman;
use App\Http\Controllers\Controller;

class ChairmenController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
    public function CreateChairmen()
    {
    	return view('admin.chairmen.create');
    }

    public function StoreChairmen(Request $request)
    {
    	$name = $request->chairmen_name;
    	$address = $request->chairmen_address;
    	$mobile = $request->mobile;
    	$email = $request->email;
    	$speech = $request->speech;
    	$count_mobile = DB::table('chairmen')->where('mobile',$request->mobile)->count();
    	$count_email = DB::table('chairmen')->where('email',$request->email)->count();
    	$data = array();
    	$data['chairmen_name'] = $name;
    	$data['chairmen_address'] = $address;
    	$data['mobile'] = $mobile;
    	$data['email'] = $email;
    	$data['speech'] = $speech;
    	if($count_mobile > 0){
    		$notification=array(
                     'messege'=>'Already, This Mobile Number has been exist',
                     'alert-type'=>'error'
                    );
                return Redirect()->back()->with($notification);
    	}
    	elseif($count_email > 0){
    		$notification=array(
                     'messege'=>'Already, This Email Number has been exist',
                     'alert-type'=>'error'
                    );
                return Redirect()->back()->with($notification);
    	}
    	else{
    		$image_one = $request->file('chaimen_image');
	    	$image_two = $request->file('chaimen_image_singnature');
	    	if(empty($name)){
	    		$notification=array(
	                     'messege'=>'Name field is required',
	                     'alert-type'=>'error'
	                    );
	                return Redirect()->back()->with($notification);
	    	}
	    	elseif(empty($address))
	    	{
	    		$notification=array(
	                     'messege'=>'Address field is required',
	                     'alert-type'=>'error'
	                    );
	                return Redirect()->back()->with($notification);
	    	}
	    	elseif(empty($mobile))
	    	{
	    		$notification=array(
	                     'messege'=>'Mobile field is required',
	                     'alert-type'=>'error'
	                    );
	                return Redirect()->back()->with($notification);
	    	}

	    	elseif(empty($email))
	    	{
	    		$notification=array(
	                     'messege'=>'Email field is required',
	                     'alert-type'=>'error'
	                    );
	                return Redirect()->back()->with($notification);
	    	}

	    	elseif(empty($speech))
	    	{
	    		$notification=array(
	                     'messege'=>'Speech field is required',
	                     'alert-type'=>'error'
	                    );
	                return Redirect()->back()->with($notification);
	    	}
	    	

	    	if($image_one && $image_two){
	           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
	                Image::make($image_one)->resize(270,270)->save('upload/chairmen/'.$image_one_name);
	                $data['chaimen_image']='upload/chairmen/'.$image_one_name;
	              


	           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
	                Image::make($image_two)->resize(270,270)->save('upload/chairmen/'.$image_two_name);
	                $data['chaimen_image_singnature']='upload/chairmen/'.$image_two_name;
	             
	        }

	        DB::table('chairmen')->insert($data);
	        $notification=array(
                     'messege'=>'Successfully, Chairman Inserted',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    	}
    	
    }

    public function AllChairmen()
    {   
    	$all = DB::table('chairmen')->orderBy('id', 'DESC')->get();
    	return view('admin.chairmen.index', compact('all'));
    }

    public function EditChairmen($id)
    {
    	$edit = DB::table('chairmen')->where('id',$id)->first();
    	return view('admin.chairmen.edit', compact('edit'));
    }
	public function UpdateChairmen(Request $request,$id){
		$data = Chairman::find($id);
		$image_one = $request->file('chaimen_image');
		$image_two= $request->file('chaimen_image_singnature');
		$slug = Str::slug($request->chairmen_name);
		if(isset($image_one)){
		   $image_one_name=$slug.'.'.hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
		   Image::make($image_one)->resize(270,270)->save('upload/chairmen/'.$image_one_name);
		   $data->chaimen_image = 'upload/chairmen/'.$image_one_name  ;
		}else{
			$image_one_name = $data->chaimen_image;
			$data->chaimen_image = $image_one_name  ;
		}

		if (isset($image_two)) {
		   $image_two_name= $slug.'.'.hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
				   Image::make($image_two)->resize(270,270)->save('upload/chairmen/'.$image_two_name);
		   $data->chaimen_image_singnature = 'upload/chairmen/'.$image_two_name;		
		} else {
		   $image_two_name = $data->chaimen_image_singnature;
		   $data->chaimen_image_singnature = $image_two_name;		
	   }

		$data->chairmen_name = $request->chairmen_name;
		$data->chairmen_address = $request->chairmen_address  ;
		$data->mobile = $request->mobile  ;
		$data->email = $request->email  ;  
		$data->save();
		if ($data) {
		   $notification=array(
			   'messege'=>'Successfully, Chairman Updated',
			   'alert-type'=>'success'
			  );
		  return Redirect()->route('chairmen.list')->with($notification);
		}else{
		   return Redirect()->back()->with($notification);
		} 
   }

   public function DeleteChairmen($id){
	$data = Chairman::find($id)->delete();
	if ($data) {
		$notification=array(
			'messege'=>'Successfully, Chairman Deleted',
			'alert-type'=>'success'
		   );
	   return Redirect()->route('chairmen.list')->with($notification);
	 }else{
		return Redirect()->back()->with($notification);
	 } 
	
}
}
