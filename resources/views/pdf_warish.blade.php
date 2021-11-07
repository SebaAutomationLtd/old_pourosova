<!doctype html>
<html lang="en">

<head>
    <title>Login Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="images/svg/logo-white-background.svg" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('warish/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('warish/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('warish/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('warish/css/responsive.css') }}">
</head>

<body>


    <section>
        <div class="container-certificate">
            <div class="certificate warish">
                <div class="border-1">
                    <div class="border-2">
                        <div class="content">
                            <div class="watermark">
                                <img class="mx-auto" src="{{ asset('img/logo.png') }}" alt="">
                            </div>
                            <!--Header Section  Start-->
                            <div class="top">
                                <div class="d-flex justify-content-between">
                                    <!-- Top Left Photo Section -->
                                    <div class="left">
                                        <div class="photo">
                                            <img src="{{ asset('warish/images/svg/qr-code.svg') }}" alt="">
                                        </div>
                                    </div>

                                    <!-- Top Center Title Section -->
                                    <div class="center text-center">
                                        <div class="govt-logo">
                                            <img class="mx-auto" src="{{ asset('img/logo.png') }}" alt="">
                                        </div>
                                        <div class="text">
                                            <div class="head">ত্রিশাল পৌরসভা</div>
                                            <div class="tail">ত্রিশাল, ময়মনসিংহ</div>
                                            <div class="title">উত্তরাধিকার সনদ</div>
                                        </div>
                                    </div>

                                    <!-- Top Center Title Section -->
                                    <div class="right">
                                        <div class="mujib-borso ml-auto">
                                            <img class="" src="
                                                {{ asset('warish/images/svg/mujib sotoborso.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Header Section  End-->

                            <div class="body">
                                <div class="sub-heading-text mb-2 font-weight-bold">সনদ নং : <span
                                        class="float-right">ইস্যু তারিখ:
                                        {{ $data->date }}</span></div>
                            </div>
                            <!-- Citizen Info Start -->

                            <!-- Citizen Info End -->

                            <!-- Declaration Start -->
                            <div class="sub-heading-text text-justify my-3">
                                স্থানীয় ৪ নং ওয়ার্ড সদস্য কর্তৃক সুপারিশক্রমে এই মর্মে উত্তরাধিকার সনদপত্র প্রদান
                                করা যাচ্ছে যে, মৃত: {{ $data->name }},
                                @if ($data->husband_name == null)পিতা : {{ $data->father_name }}@elseস্বামী: {{ $data->husband_name }}@endif, {{ $data->address }} এলাকার স্থায়ী
                                বাসিন্দা ছিলেন। মৃত্যুকালে তিনি নিম্নলিখিত উত্তরাধিকারগণকে রেখে যান।
                            </div>
                            <!-- Declaration Start -->


                            <!--Citizen Info-->
                            <table class="warish">
                                <tr>
                                    <th style="width: 50px;">ক্রমিক</th>
                                    <th>নাম</th>
                                    <th style="width: 210px; padding: 0;">ভোটার আইডি</th>

                                    <th style="width: 60px;">সম্পর্ক</th>
                                    <th style="width: 60px;">মন্তব্য</th>
                                </tr>
                                @foreach ($members as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->warish_member_name }}</td>
                                        <td>{{ $row->member_nid }}</td>
                                        <td>{{ $row->relation }}</td>
                                        <td>{{ $row->comment }}</td>
                                    </tr>
                                @endforeach

                            </table>
                            <!--Citizen Info End-->


                            <div class="sub-heading-text text-justify my-3">
                                আমি মরহুমের আত্মার মাগফেরাত ও উত্তরাধিকারগণের সর্বাঙ্গীন মঙ্গল কামনা করি।
                            </div>
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
                                        <div class="small">ইমেইলঃ <span
                                                class="small">trishalpourosova@gmail.com</span>
                                        </div>
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
                                        <div>২) উপরের QR কোড স্ক্যান করুন।</div>
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



</body>

</html>
