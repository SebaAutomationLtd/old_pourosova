@extends('Front.Layout.master')
@section('content')
    <div>





        <!--Description Start-->
        <div class="welcome mb-3" id="mayor-list">
            <div class="content-header">
                <h5 class="m-0 font-weight-bold">সম্মানিত কাউন্সিলরগণ</h5>
            </div>
            <div class="padding-15">

                @foreach ($councilors as $councilor)
                    <div class="mayor-item">
                        <div
                            class="d-flex mt-3 justify-content-sm-start justify-content-center flex-wrap align-items-center">
                            <div class="image">
                                <img class="d-block" src="{{ asset($councilor->image) }}" alt="">
                            </div>
                            <div class="title ml-3 mt-2 mt-sm-0 text-center text-sm-left">
                                <b class="name">{{ $councilor->name }}</b>
                                <div>
                                    কাউন্সিলর <br>ওয়ার্ড নং - {{ $councilor->ward_no }} <br>
                                    {{-- <i class="mr-1 fas fa-phone-alt"></i>
                                    ০১৭১২২৪৬০৫১ --}}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>


        </div>
        <!--Description End-->













    </div>
@stop
