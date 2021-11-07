@extends('Front.Layout.master')
@section('content')
    <div>





        <!--Description Start-->
        <div class="welcome mb-3" id="uno">
            <div class="content-header">
                <h5 class="m-0 font-weight-bold">প্রশাসন বিভাগ</h5>
            </div>
            <div class="padding-15">

                <div class=" text-center mt-4">
                    <div class="">
                        <div class="">
                            <img class="rounded" src="@if (isset($admin->image) && file_exists($admin->image)) {{ asset($admin->image) }} @else {{ asset('Front') }}/images/photos/Shafiqul-Islam-Chowdhury.jpg @endif" alt="">
                        </div>
                        <div class="mt-3">
                            <h4 class="name">{{ $admin->name ?? 'Full Name' }}</h4>
                            {{ $admin->designation ?? 'Designation' }} <br>
                            Madarganj Paurashava <br>
                            <i class="fas fa-tty"></i> {{ $admin->contact ?? '+880100-000-00' }}<br>
                            <i class="mr-1 fas fa-phone-alt"></i> {{ $admin->phone ?? '+880100-000-00' }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--Description End-->



    </div>
@stop
