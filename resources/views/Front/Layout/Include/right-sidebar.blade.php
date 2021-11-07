<div>

    <div class="add">
        <img src="{{ asset('Front') }}/images//add.jpg" alt="">
    </div>


    <!-- Notice Section Start -->
    <div class="notice mb-3 mt-1">
        <div class="content-header">
            <h5>
                <a href="">
                    আপডেট নোটিশ
                </a>
            </h5>
        </div>

        <div class="content-body">
            <div class="">
                <marquee scrollamount='3' behavior="" direction="up">
                    <a href="#" class="item">
                        {{ $general_settings->title_bangla }} পৌরসভায় স্মার্ট জাতীয় পরিচয়পত্র বিতরন সময়সূচীসূচী
                        <br><small>DD-MM-YYYY</small>
                    </a>
                    <a href="#" class="item">
                        {{ $general_settings->title_bangla }} পৌরসভায় চাকুরীর আবেদন পত্র
                        <br><small>DD-MM-YYYY</small>
                    </a>
                    <a href="#" class="item">
                        {{ $general_settings->title_bangla }} পৌরসভায় নিয়োগ বিজ্ঞপ্তি
                        <br><small>DD-MM-YYYY</small>
                    </a>
                    <a href="#" class="item">
                        {{ $general_settings->title_bangla }} পৌরসভায় স্মার্ট সেনিটেশন সংক্রান্ত নোটিশ
                        <br><small>DD-MM-YYYY</small>
                    </a>
                    <a href="#" class="item">
                        সমস্ত নোটিশ দেখতে ক্লিক করুন
                    </a>

                </marquee>

            </div>
        </div>

    </div>
    <!-- Notice Section Start -->


    <!-- Links Start -->
    <div class="links">
        <div class="content-header">
            <h5>
                <a>
                    গুরুত্বপূর্ণ লিঙ্কসমূহ
                </a>
            </h5>
        </div>
        <div class="content-body">
            <div class="list-group">
                @php
                    $important_links = DB::table('important_links')->where('right_sidebar', 1)->orderBy('important_links.id','DESC')->get()
                @endphp
                @foreach($important_links as $row)
                    <a href="{{$row->url}}" target="_blank"
                       class="list-group-item list-group-item-action">{{$row->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Links End -->

    <!-- Digital Day Start -->
    <div class="digital-day mt-3">
        <div class="content-header">
            <h5>
                <a>
                    ডিজিটাল দিবস
                </a>
            </h5>
        </div>
        <div>
            <img class="d-block w-100" src="{{ asset('Front') }}/images//difitalDay.jpg" alt="">
        </div>
    </div>
    <!-- Digital Day End -->


    <!-- Dengu Start -->
    <div class="digital-day mt-3">
        <div class="content-header">
            <h5>
                <a>
                    করোনা ট্রেসার
                </a>
            </h5>
        </div>
        <div>
            <img class="d-block w-100 border" src="{{ asset('Front') }}/images//dengu.jpg" alt="">
        </div>
    </div>
    <!-- Dengu End -->

    <!-- Dengu Start -->
    <div class="digital-day mt-3">
        <div class="content-header">
            <h5>
                <a>
                    একদেশ
                </a>
            </h5>
        </div>
        <div>
            <img class="d-block w-100 border" src="{{ asset('Front') }}/images/ekdesh-zakat.jpg" alt="">
        </div>
    </div>
    <!-- Dengu End -->
</div>
