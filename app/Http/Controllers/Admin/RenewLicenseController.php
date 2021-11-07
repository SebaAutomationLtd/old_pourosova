<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use \Shipu\Aamarpay\Aamarpay;
use PDF;
use URL;
class RenewLicenseController extends Controller
{
    public function RenewLicense() 
    {   
        $year = date('Y');  
    	$user_id = Auth::user()->user_id;
    	$data = DB::table('business_holds')->where('user_id',$user_id)->first();
      $renew_license = DB::table('renew_licenses')->where('user_id',$user_id)->first();
      if($renew_license){
          if($renew_license && $renew_license->payment_status == '0'){
          return redirect('/pay-to_renew_licenses');
          }
          elseif($renew_license->license_years != NULL || empty($renew_license->license_years)){
            return redirect('/pay-to_renew_licenses'); 
          }
          // else{
          //   return view('admin.RenewLicense.renew_license', compact('data', 'year', 'user_id', 'renew_license'));
          // }
      }else{
        return view('admin.RenewLicense.renew_license', compact('data', 'year', 'user_id', 'renew_license'));
      }
      
    	
    }

    public function StoreRenewLicenseYears(Request $request)
    {   
       $license_years = $request->license_years; 
       $user_id = Auth::user()->user_id;
       $replace = implode(',', $license_years);
       $data = array();
       $data['user_id'] = $user_id;
       $data['license_years'] = $replace;
       $count = DB::table('renew_licenses')->where('user_id',$user_id)->count();
       if($count > 0){
       	   $notification=array(
                     'messege'=>'Already, You have selected of the years',
                     'alert-type'=>'error'
                    );
                return Redirect()->back()->with($notification);
        
       }
       else{
         DB::table('renew_licenses')->insert($data);

       return redirect('/pay-to_renew_licenses');
       }
      
    }

    public function PayToRenewLicense()
    { 
      $user_id = Auth::user()->user_id;
      $data = DB::table('business_holds')->where('user_id',$user_id)->first();
      $en = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 );
        $bn = array( '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯' );
 
        $trade_total = str_replace( $en, $bn, $data->trade_total);
 
        
    	return view('admin.RenewLicense.pay_renew_license', compact('data', 'trade_total'));
    }

    public function PaidRenewFee()
    {
        return view('admin.RenewLicense.select_payment_type');
    }

    public function FeePaid(Request $request)
    {   
        $user_id = Auth::user()->user_id;
        $details = DB::table('business_holds')->where('user_id',$user_id)->first();

       

        DB::table('renew_licenses')
           ->where('user_id',$user_id)
            
           ->update([
               'payment_type' => $request->payment_type,
               'charge_id'  =>  $details->trade_total
           ]);

        return redirect('/pay-to_renew_licenses');
    }
   

   public function SSL()
    {
        return view('custom_ssl_page');
    }

    public function LicensePdfDownload()
    {    
         $user_id = Auth::user()->user_id;
         
         $detail = DB::table('business_holds')->where('user_id',$user_id)->first();

         //$stylesheet = file_get_contents('style.css');
            // $style_css = file_get_contents('certificate/css/style.css');
            // $res_css = file_get_contents('certificate/css/responsive.css');
            $boot_css = file_get_contents('certificate/css/bootstrap.min.css');

          //   $stylesheet  = '';
          // $stylesheet .= file_get_contents('certificate/css/bootstrap.min.css');
          // $stylesheet .= file_get_contents('certificate/css/style.css');
          // $stylesheet .= file_get_contents('certificate/css/responsive.css');

         $mpdf = new \Mpdf\Mpdf([
             'default_font_size' => 12,
             'default_font' => 'kalpurush',
         ]);

         //$path = 'certificate/images/svg/Bangladesh Govt.svg';
          //$path = 'img/logo.png';
          //$type = pathinfo($path, PATHINFO_EXTENSION);
          //$data = file_get_contents($path);
          //$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
       

          $mpdf->writeHTML(
            $this->pdfHtml()
          );

          $mpdf->Output();

         //$pdf =  $pdf = PDF::loadView('admin.RenewLicense.pdf',compact('user_id', 'detail'));

         // $pdf = PDF::loadView('admin.RenewLicense.pdf', compact('detail', 'base64'))->setOptions(['defaultFont' => 'sans-serif']);


         //  return $pdf->download('tradelicense.pdf');
        
        //return $pdf->download('new_tradelicense.pdf');

          //customFont
    }
   
    public function pdfHtml()
    {   
      $user_id = Auth::user()->user_id;
      $style_css = file_get_contents('certificate/css/style.css');
        $check = '<p>'.$user_id.'</p>';
        
        $output = '
           
     
          
        <section>
        <div class="container-certificate">
            <div class="certificate trade-lisence">
                <div class="border-1">
                    <div class="border-2">
                        <div class="content">
                            <div class="watermark">
                                <img src="" alt="">
                            </div>
                            <!--Header Section  Start-->
                            <div class="top">
                                <div class="d-flex justify-content-between">
                                    <!-- Top Left Photo Section -->
                                    <div class="left">
                                        <div class="photo">
                                            <img src="" alt="">
                                        </div>
                                    </div>

                                    <!-- Top Center Title Section -->
                                    <div class="center text-center">
                                        <div class="text">
                                            <div class="head">ত্রিশাল পৌরসভা</div>
                                            <div class="tail">ত্রিশাল, ময়মনসিংহ</div>
                                            <div class="web">https://trishalpourosova.com</div>
                                            <div class="mt-2">ট্রেড / প্রফেশন লাইসেন্স</div>
                                        </div>
                                    </div>

                                    <!-- Top Center Title Section -->
                                    <div class="right">
                                        <div class="mujib-borso ml-auto">
                                            <img class="" src="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Header Section  End-->

                           <!-- Short Description Start -->
                            <div class="short-description">
                                <div class="d-flex">
                                    <div class="left">
                                        <table>
                                            <tr width="">
                                                <td class="test">লাইসেন্স নং</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">লাইসেন্স আইডি</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">ওয়ার্ড নং</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">সার্কেল/রাস্তা/মহল্লা</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">লাইসেন্স ইস্যুর তারিখ</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">নবায়নের অর্থ বছর</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">নবায়নের তারিখ</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="photo ml-auto">
                                        <img src="images/photo.jpg" alt="">
                                    </div>
                                </div>
                            </div>                            
                           <!-- Short Description End -->

                            <div class="note">
                                পৌরসভা আইন - ২০০৯ এর ১০২-১০৮ ধারায় ৩য় তফসিল এর ৮, ১০ ও ২২ আইটেম অনুসারে (ট্রেড, প্রফেশন, কলিং ও বিজ্ঞাপন) ব্যাবসা/পেশার অনুমোদনপত্র নিম্নে বর্ণিত ব্যক্তি প্রতিষ্ঠানের অনুকুলে দেওয়া হইল। যাহার মেয়াদ ২০২১ ইং সনের ৩০ জুন পর্যন্ত বলবৎ থাকবে। 
                            </div>



                            <!--Description Start -->
                            <table class="main">
                                <tr width="">
                                    <td class="test">ব্যাবসা প্রতিষ্ঠানের নাম</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">ব্যাবসার ধরণ</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের নাম</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">পিতা/স্বামীর নাম</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">মাতার নাম</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">ব্যবসা প্রতিষ্ঠানের ঠিকানা</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের ঠিকানা (বর্তমান)</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের ঠিকানা (স্থায়ী)</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">জাতীয় পরিচয়পত্র নং</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="test">ফোন / মোবাইল নং</td>
                                    <td>:</td>
                                    <td>....................................................................................</td>
                                </tr>
                                <tr>
                                    <td class="" valign="top">আর্থিক বিবরণ</td>
                                    <td valign="top">:</td>
                                    <td>
                                        <table class="sub">
                                            <tr>
                                                <th>আদায়ের বিবরণ</th>
                                                <th>টাকা</th>
                                            </tr>
                                            <tr>
                                                <td>ট্রেড লাইসেন্স / নবায়ন ফি</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>সাইনবোর্ড কর</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>ব্যাবসার কর</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>বকেয়া</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>সারচার্জ</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>মোট</th>
                                                <th>টাকা</th>
                                            </tr>
                                        </table>

                                        <div class="small-text my-3">
                                            লাইসেন্স ধারীর নিকট হইতে সকল পাওনা বাবদ মোট ৫৮২২.০০ টাকা আদায় হইল।
                                        </div>
                                    </td>
                                </tr>                                
                            </table>
                            <!--Description End -->

                            <!-- Footer Section Start -->
                            <table class="sign" align="right">
                                <tr>
                                    <td class="left">
                                        <span></span> <br>
                                        লাইসেন্স পরিদর্শক
                                    </td>
                                    <td class="right">
                                        <span></span> <br>
                                        মেয়র
                                    </td>
                                </tr>
                            </table>
                            <!-- Footer Section End -->
                            <div class="qr-verify">
                                <div class="code">
                                    <img src="" alt="">
                                </div>
                                <div class="text-center">
                                    লাইসেন্স যাচাই করতে<br> জন্য QR কোড টি স্ক্যান করুন
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';

        return $output;
    }

    public function PdfPage()
    {   
      $count = DB::table('renew_licenses')->count()+1;  

  
         
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

       $user_id = Auth::user()->user_id;

       $data = DB::table('business_holds')
           ->join('wards', 'business_holds.ward_id', 'wards.id')
           ->select('wards.ward_no', 'business_holds.*')
           ->where('business_holds.user_id', $user_id)
          ->first();
        
        

       $n = DB::table('renew_licenses')->where('user_id', $user_id)->first();

       $sl_format = $serial_no;
       $currentDate = date("l, F j, Y");
        $engDATE = array('1','2','3','4','5','6','7','8','9', '0');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');

          $bn_serial_no= str_replace($engDATE, $bangDATE, $user_id);
        $bn_user_id = str_replace($engDATE, $bangDATE, $user_id);
        $bn_ward_id = str_replace($engDATE, $bangDATE, $data->ward_no);
        $bn_license_years = str_replace($engDATE, $bangDATE, $n->license_years);
        //$bn_date = str_replace($engDATE, $bangDATE, date('d/m/Y'));
        $bn_nid = str_replace($engDATE, $bangDATE, $data->nid);
        $bn_birth = str_replace($engDATE, $bangDATE, $data->birth_certificate);
        $bn_mobile= str_replace($engDATE, $bangDATE, $data->mobile);
        $bn_trade_fee = str_replace($engDATE, $bangDATE, $data->trade_fee);
        $bn_vat = str_replace($engDATE, $bangDATE, 15);

        $bn_singnboard_tax= str_replace($engDATE, $bangDATE, $data->singnboard_tax);
         $bn_business_tax= str_replace($engDATE, $bangDATE, $data->business_tax);
        $bn_other= str_replace($engDATE, $bangDATE, $data->other);

        $bn_total= str_replace($engDATE, $bangDATE, $data->trade_total);

        $bn_date= str_replace($engDATE, $bangDATE, $n->date);

        return view('trade_pdf_page', compact('user_id', 'data', 'bn_serial_no', 'n', 'bn_user_id', 'bn_ward_id', 'bn_license_years', 'bn_date', 'bn_nid', 'bn_birth', 'bn_mobile', 'bn_trade_fee', 'bn_vat', 'bn_singnboard_tax', 'bn_other', 'bn_total', 'bn_business_tax', 'bn_date'));
    }

    public function PrintPdfLicense()
    {  
      $count = DB::table('renew_licenses')->count()+1;  

  
         
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

       $user_id = Auth::user()->user_id;

       $data = DB::table('business_holds')
           ->join('wards', 'business_holds.ward_id', 'wards.id')
           ->select('wards.ward_no', 'business_holds.*')
           ->where('business_holds.user_id', $user_id)
          ->first();

       $n = DB::table('renew_licenses')->where('user_id', $user_id)->first();
       //return view('print_pdf_license', compact('user_id', 'data', 'serial_no', 'n'));

       //$n = DB::table('renew_licenses')->where('user_id', $user_id)->first();

       $sl_format = $serial_no;
       $currentDate = date("l, F j, Y");
        $engDATE = array('1','2','3','4','5','6','7','8','9', '0');
        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');

          $bn_serial_no= str_replace($engDATE, $bangDATE, $user_id);
        $bn_user_id = str_replace($engDATE, $bangDATE, $user_id);
        $bn_ward_id = str_replace($engDATE, $bangDATE, $data->ward_no);
        $bn_license_years = str_replace($engDATE, $bangDATE, $n->license_years);
        $bn_date = str_replace($engDATE, $bangDATE, date('d/m/Y'));
        $bn_nid = str_replace($engDATE, $bangDATE, $data->nid);
        $bn_birth = str_replace($engDATE, $bangDATE, $data->birth_certificate);
        $bn_mobile= str_replace($engDATE, $bangDATE, $data->mobile);
        $bn_trade_fee = str_replace($engDATE, $bangDATE, $data->trade_fee);
        $bn_vat = str_replace($engDATE, $bangDATE, 15);

        $bn_singnboard_tax= str_replace($engDATE, $bangDATE, $data->singnboard_tax);
         $bn_business_tax= str_replace($engDATE, $bangDATE, $data->business_tax);
        $bn_other= str_replace($engDATE, $bangDATE, $data->other);

        $bn_total= str_replace($engDATE, $bangDATE, $data->trade_total);

        return view('print_pdf_license', compact('user_id', 'data', 'bn_serial_no', 'n', 'bn_user_id', 'bn_ward_id', 'bn_license_years', 'bn_date', 'bn_nid', 'bn_birth', 'bn_mobile', 'bn_trade_fee', 'bn_vat', 'bn_singnboard_tax', 'bn_other', 'bn_total', 'bn_business_tax'));
    }
}
