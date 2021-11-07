<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class CertficateController extends Controller
{
    public function CertificateApplication()
    {   
        
   
          return view('application'); 
       
    	
    }

    public function InsertCertificateApplication(Request $request)
    {   


    	$data = array();
    	$data['user_id'] = Auth::user()->user_id;
    	$data['name'] = $request->name;
    	$data['father_name'] = $request->father_name;
    	$data['husband_name'] = $request->husband_name;
    	$data['mother_name'] = $request->mother_name;
    	$data['mobile'] = $request->mobile;
    	$data['nid'] = $request->nid;
    	$data['birth_certificate'] = $request->birth_certificate;
    	$data['day'] = $request->day;
    	$data['month'] = $request->month;
    	$data['year'] = $request->year;
    	$data['address'] = $request->address;
    	$image = $request->file('image');
    	if($image){
            $imageName = time().'.'.$request->image->extension();  
   
          $request->image->move(public_path('upload/nagorik_sonod'), $imageName);
           $data['image'] = 'upload/nagorik_sonod/'.$imageName;
        }

        DB::table('charater_certificates')->insert($data);

        $notification=array(
                 'messege'=>'Successfully Charcter Certificate Inserted',
                 'alert-type'=>'success'
                );
              return redirect()->back()->with($notification);

    }

    public function ApprovePendingCharacterApplication()
    {   
    	$user_id = Auth::user()->user_id;
    	$data = DB::table('charater_certificates')->where('user_id',$user_id)->first();

    	return view('character_application_page', compact('data'));
    }

    public function PdfCharacterCertificate()
    {   

        $user_id = Auth::user()->user_id;
        $data = DB::table('charater_certificates')->where('user_id',$user_id)->first();

        $count = DB::table('charater_certificates')->count()+1;  

  
         
       if($count < 10){
           $format = "2220"."00";
           $serial_no = $format."".$count;
       }
       elseif($count >=10 && $count<=99){
          $format = "2220"."0";
           $serial_no = $format."".$count;
       }
       else{
          $format = "2220";
           $serial_no = $format."".$count;
       } 
        return view('pdf_character_certficate', compact('data', 'serial_no'));
    }
    
    
}
