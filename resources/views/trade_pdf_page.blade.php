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

  
    
  <div id="container_content">
    <section>
        <div class="container-certificate">
            <div class="certificate trade-lisence">
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
                                        <div class="photo">
                                            <img src="{{asset('certificate/images/pdf_logo.jpeg')}}" alt="">
                                           

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
                                            <img class="" src="{{asset('certificate/images/svg/mujib sotoborso.svg')}}" alt="">
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
                                                <td>{{$bn_serial_no}}</td>
                                            </tr>
                                            <tr>
                                                <td class="test">লাইসেন্স আইডি</td>
                                                <td>:</td>
                                                <td>{{$bn_user_id}}</td>
                                            </tr>
                                            <tr>
                                                <td class="test">ওয়ার্ড নং</td>
                                                <td>:</td>
                                                <td>{{$bn_ward_id}}</td>
                                            </tr>
                                           
                                         
                                            <tr>
                                                <td class="test">নবায়নের অর্থ বছর</td>
                                                <td>:</td>
                                                <td>{{$bn_license_years}}</td>
                                            </tr>
                                            <tr>
                                                <td class="test">নবায়নের তারিখ</td>
                                                <td>:</td>
                                                <td>{{$bn_date}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    @if($data->image == NULL)
                                    @else
                                    <div class="photo ml-auto">
                                        <img src="{{asset('certificate/images/photo.jpg')}}" alt="">
                                    </div>
                                    @endif
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
                                    <td>{{$data->institute_name}}</td>
                                </tr>
                                <tr>
                                    <td class="test">ব্যাবসার ধরণ</td>
                                    <td>:</td>
                                    <td>{{$data->business_type}}</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের নাম</td>
                                    <td>:</td>
                                    <td>{{$data->owner_name}}</td>
                                </tr>
                                <tr>
                                    @if($data->husband_name == NULL)
                                    <td class="test">পিতার নাম</td>
                                    <td>:</td>
                                    <td>{{$data->father_name}}</td>
                                    @else
                                     <td class="test">স্বামীর নাম</td>
                                     <td>{{$data->husband_name}}</td>
                                   @endif
                                </tr>
                                <tr>
                                    <td class="test">মাতার নাম</td>
                                    <td>:</td>
                                    <td>{{$data->mother_name}}</td>
                                </tr>
                                <tr>
                                    <td class="test">ব্যবসা প্রতিষ্ঠানের ঠিকানা</td>
                                    <td>:</td>
                                    <td>{{$data->institute_address}}</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের ঠিকানা (বর্তমান)</td>
                                    <td>:</td>
                                    <td>{{$data->owner_current_address}}</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের ঠিকানা (স্থায়ী)</td>
                                    <td>:</td>
                                    <td>{{$data->owner_permanent_address}}</td>
                                </tr>
                                <tr>
                                    @if($data->birth_certificate == NULL)
                                    <td class="test">জাতীয় পরিচয়পত্র নং</td>
                                    <td>:</td>
                                    <td>{{$bn_nid}}</td>
                                    @else
                                    <td class="test">জন্ম সনদ নং</td>
                                    <td>:</td>
                                    <td>{{$bn_birth}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="test">ফোন / মোবাইল নং</td>
                                    <td>:</td>
                                    <td>{{$bn_mobile}}</td>
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
                                                <td>{{$bn_trade_fee}}</td>
                                            </tr>

                                            <tr>
                                                <td>ভ্যাট</td>
                                                <td>{{$bn_vat}}%</td>
                                            </tr>

                                            <tr>
                                                <td>সাইনবোর্ড কর</td>
                                                <td>{{$bn_singnboard_tax}}</td>
                                            </tr>
                                            <tr>
                                                <td>ব্যাবসার কর</td>
                                                <td>{{$bn_business_tax}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>সারচার্জ</td>
                                                <td>{{$bn_other}}</td>
                                            </tr>
                                            <tr>
                                                <th>মোট</th>
                                                <th>{{$bn_total}} টাকা</th>
                                            </tr>
                                        </table>

                                        <div class="small-text my-3">
                                            লাইসেন্স ধারীর নিকট হইতে সকল পাওনা বাবদ মোট {{$bn_total}} টাকা আদায় হইল।
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
                                <div class="code" >


                                    <img src="{{asset('/certificate/images/svg/qr-code.svg')}}" alt="">
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
    </section>

  </div>
  
</body>

</html>