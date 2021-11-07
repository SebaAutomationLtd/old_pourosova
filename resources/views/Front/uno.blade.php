@extends('Front.Layout.master')

@section('content')
    <div>
        <div>
            <!--Description Start-->
            <div class="welcome mb-3" id="uno">
                <div class="content-header">
                    <h5 class="m-0 font-weight-bold">উপজেলা নির্বাহি কর্মকর্তা</h5>
                </div>
                <div class="padding-15">

                    <!--Mayor Name-->
                    <div class=" text-center mt-4">
                        <div class="">
                            <div class="">
                                <img class="rounded" src="@if (isset($uno->image) && file_exists($uno->image)) {{ asset($uno->image) }} @else {{ asset('Front') }}/images/photos/Shafiqul-Islam-Chowdhury.jpg @endif" alt="">
                            </div>
                            <div class="mt-3">
                                <h4 class="name">{{ $uno->name ?? 'Full Name' }}</h4>
                                {{ $uno->designation ?? 'Designation' }} <br>
                                Madarganj Paurashava <br>
                                <i class="fas fa-tty"></i> {{ $uno->contact ?? '+880100-000-00' }}<br>
                                <i class="mr-1 fas fa-phone-alt"></i> {{ $uno->phone ?? '+880100-000-00' }}
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <!--Description End-->



        </div>
    </div>
@stop
