 @extends('member_master')
 @section('member_content')
  
  
   <div class="col-lg-9 mt-4 mt-lg-0">
   <div class="dashboard-body">
       <div class="content-header" style="padding: 15px;">
	   আপনার মৃত্যু সনদটি ডাউনলোড করতে <a style="cursor: pointer; color: red;" class="death_pdf">এখানে ক্লিক</a> করুন
	    </div>
	</div>
	
	
	  <section>
        <div class="container-certificate">
            <div class="certificate">
                <div class="border-1">
                    <div class="border-2">
                        <div class="content">
                            <div class="watermark">
                                <img src="{{asset('certificate/images/pdf_logo.jpeg')}}" alt="">
                            </div>
                            <!--Header Section  Start-->
                            <div class="top">
                                <div class="d-flex justify-content-between">
                                    <!-- Top Left Photo Section -->
                                    <div class="left">
                                        
                                    </div>

                                    <!-- Top Center Title Section -->
                                    <div class="center text-center">
                                        <div class="govt-logo">
                                            <img class="mx-auto" src="{{asset('certificate/images/pdf_logo.jpeg')}}" alt="">
                                        </div>
                                        <div class="text">
                                            <div class="head">ত্রিশাল পৌরসভা</div>
                                            <div class="tail">ত্রিশাল, ময়মনসিংহ</div>
                                          <div class="title">মৃত্যু সনদ</div>
                                        </div>
                                    </div>

                                    <!-- Top Center Title Section -->
                                    <div class="right">
                                        
                                    </div>
                                </div>
                            </div>
                            <!--Header Section  End-->
                            
                      <input type="hidden" name="verified_nagorik_id" class="verified_nagorik_id" value="{{$serial_no}}"> 
                      
                            <div class="body">
                                <div class="sub-heading-text mb-2">সনদ নংঃ {{$serial_no}}</div>
                                <div class="d-flex justify-content-between mb-1">
                                    <div class="heading-text">নাগরিক তথ্যঃ</div>
                                    <div class="date">ইস্যু তারিখঃ {{$data->date}}</div>
                                </div>
                                <!-- Citizen Info Start -->
                                <table>
                                    <tr>
                                        <th width="220">১) নাম</th>
                                        <td>:</td>
                                        <td>{{$data->name}}</td>
                                    </tr>
                                    @if($data->husband_name == NULL)
                                    <tr>
                                        <th>২) পিতা</th>
                                        <td>:</td>
                                        <td>{{$data->father_name}}</td>
                                    </tr>
                                    @else
                                     <tr>
                                        <th>২) স্বামী</th>
                                        <td>:</td>
                                        <td>{{$data->husband_name}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>৩) মাতা</th>
                                        <td>:</td>
                                        <td>{{$data->mother_name}}</td>
                                    </tr>
                                    @if($data->birth_certificate == NULL)
                                    <tr>
                                        <th>৪) জাতীয় পরিচয়পত্র</th>
                                        <td>:</td>
                                        <td>{{$data->nid}}</td>
                                    </tr>
                                    @else
                                     <tr>
                                        <th>৪) জন্ম নিবন্ধন</th>
                                        <td>:</td>
                                        <td>{{$data->birth_certificate}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>৫) জন্ম তারিখ</th>
                                        <td>:</td>
                                        <td>{{$data->birth_day}} {{$data->birth_month}} {{$data->birth_year}}</td>
                                    </tr>
                                   @if($data->husband_name == NULL && $data->wife_name == NULL)
                                   @elseif($data->husband_name == NULL)
                                    <tr>
                                      <th>৬) স্ত্রীর নাম</th>
                                        <td>:</td>
                                        <td>{{$data->wife_name}}</td>  
                                    </tr>
                                    
                                 @elseif($data->wife_name == NULL)
                                  <tr>
                                      <th>৬) স্বামীর নাম</th>
                                        <td>:</td>
                                        <td>{{$data->husband_name}}</td>  
                                    </tr>
                                 @endif
                                 
                                 
                                 <tr>
                                        <th>৭) মৃত্যুর তারিখ</th>
                                        <td>:</td>
                                        <td>{{$data->death_day}} {{$data->death_month}} {{$data->death_year}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>৬) ঠিকানা</th>
                                        <td>:</td>
                                        <td>{{$data->address}}</td>
                                    </tr>
                                </table>
                                <!-- Citizen Info End -->

                                <!-- Declaration Start -->
                                <div class="sub-heading-text text-justify mt-4">
                                    এই মর্মে সনদ প্রদান করা যাচ্ছে যে, তিনি অত্র পৌরসভার একজন স্থায়ী বাসিন্দা হিসেবে আমার কাছে পরিচিত। আমার জানামতে আমার জানামতে উনার বিরুদ্ধে কোনো রাষ্ট্র বিরোধী অভিযোগ নেই।
                                    <br><br>
                                    আমি মরহুমের আত্নার মাগফেরাত কামনা করি।
                                </div>
                                <!-- Declaration Start -->
                            </div>

                            <!-- Footer Section Start -->
                            <div class="footer">
                                <table class="mayor">
                                    <tr>
                                        <td></td>
                                         <!-- Mayor Sign -->
                                        <td width="300" class="text-center">
                                            <div class="heading-text">এবিএম আনিসুজ্জামান</div>
                                            <div class="sub-heading-text">মেয়র</div>
                                            <div class="small">ত্রিশাল পৌরসভা</div>
                                            <div class="small">ত্রিশাল, ময়মনসিংহ</div>
                                            <div class="small">মোবাইলঃ ০১৭২০০০০০০০</div>
                                            <div class="small">ইমেইলঃ <span class="small">trishalpourosova@gmail.com</span></div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="heading-text">
                                    সনদ যাচাই
                                </div>
                                <!-- Certificate Verify -->
                                <table class="mt-1" style="width: 100%;">
                                    <tr>
                                        <td valign="top">
                                            <div>১) ভিজিট করুন : https://trishalpourosova.com</div>
                                            <div>২) QR কোড স্ক্যান করুন।</div>
                                        </td>
                                        <td width="200" style="text-align: right;">
                                        <div id="nagorik_qrcode">
                                        <img class="qr-code" src="{{asset('certificate/images/svg/qr-code.svg')}}" alt="">
                                         </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="text-center small mt-2">কারিগরি সহযোগিতায়: Tech Path Limited</div>
                            </div>
                            <!-- Footer Section End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
 </div>
 
 <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $(document).ready(function($){
 
      $(document).on('click', '.death_pdf', function(e){
          e.preventDefault();
          var val = $('.container-certificate').html();
          var opt = 
                        {
                          margin:       0,
                          filename:     'death_certificate_'+js.AutoCode()+'.pdf',
                          image:        { type: 'jpeg', quality: 0.98 },
                          html2canvas:  { scale: 2},
                          jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
                        };

                        // New Promise-based usage:
                        html2pdf().set(opt).from(val).save();
      });
  });
  
   
</script>
@endsection