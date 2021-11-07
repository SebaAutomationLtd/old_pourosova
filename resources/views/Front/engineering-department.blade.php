@extends('Front.Layout.master')
@section('content')
    <div>

        <!--Description Start-->
        <div class="welcome mb-3" id="uno">
            <div class="content-header">
                <h5 class="m-0 font-weight-bold">প্রকৌশল বিভাগ</h5>
            </div>
            <div class="padding-15">

                <!--Mayor Name-->
                <div class=" text-center mt-4">
                    <div class="">
                        <div class="">
                            <img class="rounded" src="@if (isset($engineer->image) && file_exists($engineer->image)) {{ asset($engineer->image) }} @else {{ asset('Front') }}/images/photos/Shafiqul-Islam-Chowdhury.jpg @endif" alt="">
                        </div>
                        <div class="mt-3">
                            <h4 class="name">{{ $engineer->name ?? 'Full Name' }}</h4>
                            {{ $engineer->designation ?? 'Designation' }} <br>
                            Madarganj Paurashava <br>
                            <i class="fas fa-tty"></i> {{ $engineer->contact ?? '+880100-000-00' }}<br>
                            <i class="mr-1 fas fa-phone-alt"></i> {{ $engineer->phone ?? '+880100-000-00' }}
                        </div>
                    </div>
                </div>


            </div>

            <div class="content-header my-3 ">
                <h5 class="m-0 font-weight-bold">অন্যান্য কর্মকর্তা</h5>
            </div>

            <div id="engineering-dept" class="padding-15">
                <div class="d-none d-sm-block">
                    <div class="form-row single-item single-item-header">
                        <div class="col-sm-4 font-weight-bold">
                            নাম
                        </div>
                        <div class="col-sm-4 font-weight-bold">
                            পদবী
                        </div>
                        <div class="col-sm-4 font-weight-bold">
                            মোবাইল নং
                        </div>
                    </div>
                </div>
                @foreach ($others as $other)

                    <!--Single Item-->
                    <div class="form-row single-item">
                        <div class="col-sm-4 font-weight-bold title">
                            {{ $other->name }}
                        </div>
                        <div class="col-sm-4">
                            {{ $other->designation }}
                        </div>
                        <div class="col-sm-4">
                            {{ $other->contact }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--Description End-->

    </div>
@stop
