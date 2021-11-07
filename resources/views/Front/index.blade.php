@extends('Front.Layout.master')

@section('content')
    <div>
        <!--Main Slider Start-->
        <div id="main-slider" class="carousel slide px-2 px-sm-0" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#main-slider" data-slide-to="0" aria-current="location"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
            </ol>
            @php
                $active = DB::table('website_sliders')->orderBy('id', 'DESC')->first();
                $sliders = DB::table('website_sliders')->where('id', '!=', $active->id)->orderBy('website_sliders.id', 'DESC')->get()
            @endphp
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{URL::to($active->slider_image)}}" alt="">

                </div>
                @foreach($sliders as $slider)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{URL::to($slider->slider_image)}}" alt="">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#main-slider" data-slide="prev" role="button">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#main-slider" data-slide="next" role="button">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--Main Slider Start-->


        <!--Sub Notice Start-->
        <div class="sub-notice my-3">
            <div>
                <a href="">
                    {{ $general_settings->title_bangla }} পৌরসভার সকল সেবা এখন অনলাইনে ।
                </a>
            </div>
        </div>
        <!--Sub Notice End-->


    @php
        $desc = DB::table('welcome_descriptions')->where('id',1)->first()

    @endphp

    <!--Sub Notice Start-->
        <div class="welcome my-3">
            <div class="content-header mb-3">
                <h5 class="m-0 font-weight-bold">স্বাগতম</h5>
            </div>
            <div class="padding-15">
                {{strip_tags($desc->description)}}
            </div>
        </div>
        <!--Sub Notice End-->


        <!--Service Start-->
        <div class="service my-3">

            <div class="content-header mb-3">
                <h5 class="m-0 font-weight-bold">আমাদের সেবাসমূহ</h5>
            </div>
            <div class="content">
                <div class="padding-15">
                    <!--Service Item Start-->
                    <div class="form-row">

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="fas fa-house-user"></i>
                                        <div class="title">
                                            হোল্ডিং কর
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="fas fa-users"></i>
                                        <div class="title">
                                            উত্তরাধিকার সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="fas fa-certificate"></i>
                                        <div class="title">
                                            চারিত্রিক সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="fas fa-restroom"></i>
                                        <div class="title">
                                            বিয়ের সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">
                                        <i class="fas fa-restroom"></i>
                                        <div class="title">
                                            পূণঃবিবাহ সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="fas fa-briefcase"></i>
                                        <div class="title">
                                            ঠিকাধারী লাইসেন্স
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">
                                        <i class="fas fa-signal"></i>
                                        <div class="title">
                                            ট্রেড লাইসেন্স
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="far fa-list-alt"></i>
                                        <div class="title">
                                            নাগরিক সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="far fa-file-image"></i>
                                        <div class="title">
                                            মৃত সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">

                                        <i class="fas fa-save"></i>
                                        <div class="title">
                                            এতিম সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Service Item -->
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">
                                        <i class="fas fa-money-check"></i>
                                        <div class="title">
                                            আয়ের সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-6">
                            <a href="#">
                                <div class="card mt-2">
                                    <div class="card-body text-center">
                                        <i class="fas fa-receipt"></i>
                                        <div class="title">
                                            বেকারত্ব সনদ
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>


                </div>
            </div>
        </div>
        <!--Service Item End-->


    </div>
@stop
