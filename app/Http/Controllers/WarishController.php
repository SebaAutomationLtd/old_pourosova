<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class WarishController extends Controller
{
    public function InsertWarishApplication(Request $request)
    {   
        $user_id = Auth::user()->user_id;
        
        
        $random_id = rand(10, 1000);
        $warish_member_name = $request->warish_member_name;
        $data = array();
        $data['name'] = $request->name;
        $data['random_id'] = $random_id;
        $data['user_id'] = Auth::user()->user_id;
        $data['husband_name'] = $request->husband_name;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['nid'] = $request->nid;
        $data['birth_certificate'] = $request->birth_certificate;
        $data['mobile'] = $request->mobile;
        $data['address'] = $request->address;
        $data['date'] = date('Y-m-d');
        $data['status'] = 0;
        
        $recent = DB::table('warish_certificates')->where('user_id', $user_id)->orderBy('id', 'DESC')->first();
        
       if($request->check == 1){
           
  
            DB::table('warish_certificates')->insert($data);
            for($count=0; $count < count($warish_member_name); $count++)
           {
               $data_var = array(
                  'user_id' =>$user_id, 
                  'random_id' => $random_id,
                   'member_nid' => $request->member_nid[$count],
                  'warish_member_name' => $request->warish_member_name[$count],
                  'relation' => $request->relation[$count],
                  'comment' => $request->comment[$count],
                 
                 
               );
               $insert_data[] = $data_var;
            
          }
          
           DB::table('warish_members')->insert($insert_data);
           $notification=array(
                 'messege'=>'Successfully Warish Member Inserted',
                 'alert-type'=>'success'
                );
              return redirect()->back()->with($notification);
           
        
       }
       else{
            $notification=array(
                 'messege'=>'Please, Select Your Warish Member',
                 'alert-type'=>'error'
                );
              return Redirect()->back()->with($notification);
       }
        
        
    }
    
    public function SuccessPendingWarish()
    {
        return view('warish_page');
    }
    
    public function PdfWarish($id)
    {
        $user_id = Auth::user()->user_id;
        $data = DB::table('warish_certificates')->where('user_id',$user_id)->where('id',$id)->first();
        
        $members = DB::table('warish_members')->where('user_id', $user_id)->where('random_id', $data->random_id)->get();

        $count = DB::table('warish_certificates')->count()+1;  

  
         
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
       
       
        return view('pdf_warish', compact('data', 'serial_no', 'members'));
    }
}
