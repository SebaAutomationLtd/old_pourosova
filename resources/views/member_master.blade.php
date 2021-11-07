<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User Dashboard | Madarganj Pourosova</title>
    <meta name="description" content="">
    <link rel="apple-touch-icon" href="{{ asset('user/img/svg/logo-white-background.svg') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('img/logo.svg') }}" />
    <!--All CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('certificate/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('certificate/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('certificate/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('certificate/css/responsive.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('new_dash/vendors/datatables/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('new_dash/css/custom_css/datatables_custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('new_dash/css/responsive.dataTables.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

</head>

<body>
    <!--Header Section Start-->
    <section id="nav">
        <div class="container">
            <div class="menu-bar py-2">
                <div class="d-flex">
                    <div class="d-flex align-items-center">
                        <img class="logo" src="{{ asset('img/logo.svg') }}" alt="">
                        <span class="ml-2 ml-sm-3 title">মাদারগঞ্জ পৌরসভা</span>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <div class="user-info-right">
                            <a href="">
                                <img src="{{ asset(Auth::user()->photo) }}" alt="">
                                <span class="ml-2 d-none d-sm-inline">{{ Auth::user()->name }}<i
                                        class="fas fa-caret-down"></i> <span class="caret"></span></span>
                            </a>
                            <div class="dropdownmenu">
                                <a href="">প্রোফাইল</a>
                                <a href="">পাসওয়ার্ড পরিবর্তন</a>
                                <a href="{{ URL::to('/member-logout') }}">লগআউট</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Header Section End-->


    <!--Banner Section Start-->
    <section id="banner">
        <div class="overlay">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="title">
                        স্বাগতম
                    </div>
                    <div class="ml-auto">
                        প্রোফাইল / এডিট
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Banner Section End-->


    <!--User Profile Section Start-->
    @php
        $user_id = Auth::user()->user_id;
        $check_business_member = DB::table('business_holds')->count();
    @endphp
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="d-none d-md-block">
                            <div class="user-photo-name text-center">
                                <?php
                                $count_business_hold = DB::table('business_holds')
                                    ->where('user_id', Auth::user()->user_id)
                                    ->count();
                                if ($count_business_hold > 0) {
                                    $data = DB::table('business_holds')
                                        ->where('user_id', Auth::user()->user_id)
                                        ->first();
                                } else {
                                    $data = DB::table('general_members')
                                        ->where('user_id', Auth::user()->user_id)
                                        ->first();
                                }
                                $user = DB::table('users')
                                    ->where('user_id', $user_id)
                                    ->first();
                                ?>

                                @if ($user->role == 'Business Hold Reg')
                                    @if ($data->image == null)
                                        <div class="photo">
                                            <img class="rounded my-4" src="{{ asset(Auth::user()->photo) }}"
                                                alt="">
                                        </div>
                                    @else
                                        <div class="photo">
                                            <img class="rounded my-4" src="{{ asset(Auth::user()->photo) }}"
                                                alt="">
                                        </div>
                                    @endif

                                @else
                                    <div class="photo" style="padding: 10px;">
                                        <div class="photo">
                                            <img class="rounded my-4" src="{{ asset(Auth::user()->photo) }}"
                                                alt="">
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::check())
                                    <div class="name">
                                        <h5>{{ Auth::user()->name }}</h5>
                                    </div>
                                @else
                                @endif
                            </div>
                        </div>
                        <div class="items">
                            <a href="{{ route('member.dashboard') }}" class="active"><i
                                    class="fa fa-bars"></i>Dashboard</a>
                            <a href="#"><i class="fa fa-bars"></i>মাই এ‌সেস‌মেন্ট</a>
                            @if (Auth::user()->role == 'Bosot Bari Member')
                            @else
                                <a href="{{ route('renew.license') }}"><i class="fa fa-bars"></i>লাইসেন্স
                                    নবায়ন</a>
                            @endif

                            @if (Auth::user()->role == 'Bosot Bari Member')
                                <a href="{{ route('sanad.select') }}"
                                    class="{{ Request::is('sanad_select') || Request::is('sanad_view') || Request::is('sanad_apply') ? 'active' : '' }}"><i
                                        class="fa fa-bars"></i>সনদপত্র/প্রত্যয়ন আবেদন</a>
                            @else

                            @endif

                            <a href="{{ route('total.nagorik_sonod') }}"><i class="fa fa-bars"></i>নাগরিক
                                সনদসমূহ</a>

                            <a href="{{ route('total.character_sonod') }}"><i class="fa fa-bars"></i>
                                চারিত্রিক সনদসমূহ
                            </a>

                            <a href="{{ route('total.warish_sonod') }}"><i class="fa fa-bars"></i>
                                ওয়ারিশ সনদসমূহ
                            </a>


                            <a href="{{ route('total.death_sonod') }}"><i class="fa fa-bars"></i>
                                মৃত্যু সনদসমূহ
                            </a>


                            <a href="{{ route('total.orphan_sonod') }}"><i class="fa fa-bars"></i>
                                এতিম সনদসমূহ
                            </a>


                            <a href="#"><i class="fa fa-bars"></i>সনদ ডাউন‌লোড</a>
                            <a href="#"><i class="fa fa-bars"></i>ব‌কেয়া কর প‌রি‌শোধ</a>
                            <a href="#"><i class="fa fa-bars"></i>সকল লেন‌দেন</a>
                            <a href="#"><i class="fa fa-bars"></i>অন্যান্য সেবা</a>
                        </div>
                    </div>
                </div>
                @yield('member_content')
            </div>
        </div>
    </section>
    <!--User Profile Section End-->








    <footer id="footer" class="mb-5">
        <div class="container">
            <div class="d-flex flex-wrap">
                <div class="left mx-auto mx-sm-0">
                    <div class="mr-2 text">কারিগরি সহযোগিতায় - </div>
                    <a href="">
                        <img class="techpath" src="img/svg/Tech Path Limited Logo.svg" alt="">
                    </a>
                </div>
                <div class="ml-auto mt-4 mt-sm-0 mr-auto mr-sm-0">
                    <img class="govt-logo" src="img/svg/govt-logo.svg" alt="">
                </div>
            </div>
        </div>
    </footer>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        @if (Session::has('messege'))
            var type="{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
            }
        @endif
    </script>


    <script src="{{ asset('user/js/jquery-3.5.1.slim.min.js') }}" type="text/javascript"></script>


    <script type="text/javascript" src="{{ asset('new_dash/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('new_dash/vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('new_dash/js/dataTables.responsive.min.js') }}"></script>

    <script src="{{ asset('user/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('user/js/custom.js') }}" type="text/javascript"></script>

    <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script>
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function($) {

            $(document).on('click', '.warih_pdf', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ url('/pdf-warish') }}/" + id,

                    type: "GET",

                    dataType: "html",
                    success: function(data) {


                        var opt = {
                            margin: 0,
                            filename: 'warish_certificate_' + js.AutoCode() + '.pdf',
                            image: {
                                type: 'jpeg',
                                quality: 0.98
                            },
                            html2canvas: {
                                scale: 2
                            },
                            jsPDF: {
                                unit: 'in',
                                format: 'A4',
                                orientation: 'portrait'
                            }
                        };

                        // New Promise-based usage:
                        html2pdf().set(opt).from(data).save();
                    },
                });
            });

        });
    </script>
</body>

</html>
