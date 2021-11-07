<div>
    <div>
        <div class="mayor-section">
            <div class="content-header">
                <h5>
                    <a href="">
                        সম্মানিত মেয়র
                    </a>
                </h5>
            </div>
            <a href="#">
                <div class="mayor">
                    @php
                     $meyor =  DB::table('meyors')->where('id', 1)->first();
                    @endphp
                    <div class="text-center">
                        <img class="rounded img-fluid w-100 d-block"
                            src="{{URL::to($meyor->image)}}" alt="">
                        <h5 class="mt-2 mb-0">{{$meyor->name}}</h5>
                        <div>
                            মেয়র, {{$meyor->meyor_place}}
                        </div>

                    </div>
                </div>
            </a>
        </div>


        <div class="councilor-section mt-3">
            <div class="content-header">
                <h5>
                    <a href="">
                        সম্মানিত কাউন্সিলরগণ
                    </a>
                </h5>
            </div>

            <div class="councilor">
                <div class="text-center">
                    <div class="form-row">
                        <!-- Councilor By Ward -->
                        @php
                         $councilors = DB::table('councilors')->take(10)->get();
                        @endphp
                        @foreach($councilors as $row)
                        <div class="col-6">
                            <a href="#">
                                <div class="info">
                                    <img  class="img-fluid w-100 d-block"
                                        src="{{URL::to($row->image)}}" alt="">
                                    <h5 class="m-0 title">ওয়ার্ড {{$row->ward_no}}</h5>
                                </div>
                            </a>
                        </div>
                     @endforeach
                       



                    </div>

                </div>
            </div>
        </div>
        <!-- Councilor Section End  -->



        <!-- Female Councilor Section Start  -->
        <div class="councilor-section mt-3">
            <div class="content-header">
                <h5>
                    <a href="">
                        সংরক্ষিত আসনের কাউন্সিলরগণ
                    </a>
                </h5>
            </div>

            @php
             $n = DB::table('mohila_councilors')->orderBy('id', 'DESC')->take(3)->get();
            @endphp
            <!--  Councilor By Ward -->
            <div class="councilor">
                <div class="text-center">
                    <div class="form-row">

                        <!-- Councilor By Ward -->
                        @foreach($n as $data)
                        <div class="col-4">
                            <a href="#">
                                <div class="info">
                                    <img class="img-fluid w-100 d-block"
                                        src="{{$data->image}}" alt="">
                                </div>
                            </a>
                        </div>

                       @endforeach


                    </div>
                </div>
            </div>

        </div>
        <!-- Female Councilor Section End -->

        <!-- Important Links Start -->
        <div class="application-link-section mt-3">
            <div class="content-header">
                <h5>
                    <a>
                        গুরুত্বপূর্ণ আবেদনপত্র
                    </a>
                </h5>
            </div>

            <div class="app-links ">
                <div>
                    <div class="list-group">
                        @php
                         $important_links = DB::table('important_links')->where('left_sidebar', 1)->orderBy('important_links.id','DESC')->get();
                        @endphp
                        @foreach($important_links as $row)
                        <a href="#" class="list-group-item list-group-item-action">{{$row->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Important Links Start -->


        <!-- Hotline Start -->
        <div class="application-link-section mt-3">
            <div class="content-header">
                <h5>
                    <a>
                        জরুরি হটলাইন
                    </a>
                </h5>
            </div>

            <div class="app-links ">
                <div>
                    <div>
                        <img class="d-block w-100" src="{{ asset('Front') }}/images//govt-number.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hotline End -->







    </div>
</div>
