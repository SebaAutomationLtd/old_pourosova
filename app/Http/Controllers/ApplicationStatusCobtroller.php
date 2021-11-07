<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ApplicationStatusCobtroller extends Controller
{
    public function MyNagorikList()
    {
        $all = DB::table('sanad_applies')->where('user_id', Auth::user()->user_id)->orderBy('id', 'DESC')->get();
        return view('my_nagorik_sonod', compact('all'));
    }
    
    public function MyCharacterList()
    {   
        $all = DB::table('charater_certificates')->where('user_id', Auth::user()->user_id)->orderBy('id', 'DESC')->get();
        return view('my_character_sonod', compact('all'));
    }
    
    public function MyCharacterDetails($id)
    {
        $data = DB::table('charater_certificates')->where('user_id', Auth::user()->user_id)->where('id',$id)->first();
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
          
         return view('my_character_details', compact('data', 'serial_no'));
    }
    
    public function MyWarishList()
    {
        $all = DB::table('warish_certificates')->where('user_id', Auth::user()->user_id)->get();
        return view('my_warish_sonod', compact('all'));
    }
    
    public function MyWarishDetails($id)
    {
        $user_id = Auth::user()->user_id;
        $data = DB::table('warish_certificates')->where('user_id',$user_id)->first();
        
        $members = DB::table('warish_members')->where('user_id', $user_id)->get();

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
       
      return view('my_warish_details', compact('data', 'serial_no', 'members'));
    }
    
    public function DeadSonod()
    {
        return view('dead_sonod_create');
    }
    
    public function InsertDeathSonod(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['husband_name'] = $request->husband_name;
        $data['wife_name'] = $request->wife_name;
        $data['birth_day'] = $request->birth_day;
        $data['birth_month'] = $request->birth_month;
        $data['birth_year'] = $request->birth_year;
        $data['nid'] = $request->nid;
        $data['birth_certificate'] = $request->birth_certificate;
        $data['death_day'] = $request->death_day;
        $data['death_month'] = $request->death_month;
        $data['death_year'] = $request->death_year;
        $data['death_reason'] = $request->death_reason;
        $data['address'] = $request->address;
        DB::table('death_certficated')->insert($data);
         $notification=array(
             'messege'=>'Successfully, Death Certificate Inserted',
             'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    
    public function MyDeadList()
    {
        $all = DB::table('death_certficated')->where('user_id', Auth::user()->user_id)->orderBy('id', 'DESC')->get();
        return view('my_dead', compact('all'));
    }
    
    public function Mydeaddetails($id)
    {
         $data = DB::table('death_certficated')->where('user_id', Auth::user()->user_id)->where('id',$id)->first();
          $count = DB::table('death_certficated')->count()+1;  
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
       
          
         return view('my_dead_details', compact('data', 'serial_no'));
    }
    
    public function OrphanSanad()
    {
        return view('my_orphan_sonod_create');
    }
    
    public function InsertOrphanSanad(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['user_id'] = Auth::user()->user_id;
        $data['nid'] = $request->nid;
        $data['birth_certficate'] = $request->birth_certficate;
        $data['mother_name'] = $request->mother_name;
        $data['father_name'] = $request->father_name;
        $data['address'] = $request->address;
        $data['date'] = date('Y-m-d');
        $data['day'] = $request->day;
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        DB::table('orphan_certficates')->insert($data);
        $notification=array(
             'messege'=>'Successfully, Orphan Certificate Inserted',
             'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
    
    public function MyOrphanList()
    {   
        $user_id = Auth::user()->user_id;
        $all = DB::table('orphan_certficates')->where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        return view('my_orphan', compact('all'));
    }
    
    public function MyOrphanDetails($id)
    {
        $data = DB::table('orphan_certficates')->where('user_id', Auth::user()->user_id)->where('id',$id)->first();
          $count = DB::table('orphan_certficates')->count()+1;  
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
       
          
         return view('my_orphan_details', compact('data', 'serial_no'));
    }
}
