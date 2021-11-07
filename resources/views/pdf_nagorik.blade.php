<!doctype html>
<html lang="en">

<head>
    <title>Login Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->    
    <link rel="shortcut icon" href="{{asset('certificate/images/svg/logo-white-background.svg')}}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{asset('certificate/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('certificate/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('certificate/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('certificate/css/responsive.css')}}">
</head>

<body>
    

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
                                          <div class="title">নাগরিক সনদ</div>
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
                                        <td>{{$data->day}} {{$data->month}} {{$data->year}}</td>
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
                                    আমি তার সবসময় উন্নতি ও মঙ্গল কামনা করি। 
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
                                         <div id="qrcode_nagork"></div> 
                                         
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script>
    $(document).ready(function(){
       
    });
</script>    
</body>

</html>