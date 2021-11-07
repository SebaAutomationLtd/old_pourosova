<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\SanadApply;
use Illuminate\Support\Facades\Auth;
use DB;
class SanadApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }
    public function sanadSelect(){   
      return view('member.sanad_select'); 
     }
     public function sanadView(Request $request){
        if ($request->nagarik_sanad == 1) { 
            return redirect('/nagorik-member');
           //return view('member.sanad_view');
        }
        elseif($request->nagarik_sanad == 3){
            
            return redirect('/warish-sanad');
        }
        elseif($request->nagarik_sanad == 4){
            return redirect('/death-sanad');
        }
        elseif($request->nagarik_sanad == 5){
            return redirect('/orphan-sanad');
        }
        else{
            return redirect('/certificate-application');
        }
     }
     
     public function WarishSonod()
     {   
        
       
           return view('warish_sonod_create');  
         
         
     }
     
     public function NagorikMember()
     {   
            return view('member.sanad_view');
     
     }
     public function sanadApply(Request $request){
         
         $mobile = $request->mobile; 
         $apply = new SanadApply();
         $apply->user_id = Auth::user()->user_id;
         $apply->name = $request->name;
         $apply->father_name = $request->father_name;
         $apply->husband_name = $request->husband_name;
         $apply->mother_name = $request->mother_name;
         $apply->nid = $request->nid;
         $apply->birth_certificate = $request->birth_certificate;
         $apply->mobile = $mobile;
         $apply->day = $request->day;
         $apply->month = $request->month;
         $apply->year = $request->year;
         $apply->address = $request->address;
         $apply->status = 0;
         $image = $request->file('image');
         if($image){
            $imageName = time().'.'.$request->image->extension();  
   
          $request->image->move(public_path('upload/Sanad-Apply'), $imageName);
        $apply->image= 'upload/Sanad-Apply/'.$imageName;
        }
        $apply->save(); 

        

        $check = SanadApply::where('user_id',Auth::user()->user_id)->first();
         $notification=array(
                 'messege'=>'Successfully Nagirk Member Inserted',
                 'alert-type'=>'success'
                );
              return redirect()->back()->with($notification);
     }
     
     
      public function PdfNagorik(Request $request)
     {
        $user_id = Auth::user()->user_id;
        $data = DB::table('sanad_applies')->where('user_id',$user_id)->where('id', $request->id)->first();

        $count = DB::table('sanad_applies')->count()+1;  

  
         
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
       
       
        return view('pdf_nagorik', compact('data', 'serial_no'));
     }
     
     public function MyNagorikDetails($id)
     {
         $data = DB::table('sanad_applies')->where('user_id', Auth::user()->user_id)->where('id',$id)->first();
          $count = DB::table('sanad_applies')->count()+1;  
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
           
         return view('my_nagorik_details', compact('data', 'serial_no'));
     }
}

 








 



