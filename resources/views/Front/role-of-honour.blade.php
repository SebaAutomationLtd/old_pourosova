@extends('Front.Layout.master')


@section('content')
    <div>


        <!--Description Start-->
        <div class="welcome mb-3" id="mayor-list">
            <div class="content-header">
                <h5 class="m-0 font-weight-bold">সম্মানিত মেয়রদের তালিকা</h5>
            </div>
            <div class="padding-15">

                <!--Mayor Name-->
                <div class="mayor-item">
                    <div class="d-flex mt-3 justify-content-sm-start justify-content-center flex-wrap align-items-center">
                        <div class="image">
                            <img class="d-block" src="{{ asset('Front') }}/images/photos/mayor.jpg" alt="">
                        </div>
                        <div class="title ml-2 mt-2 mt-sm-0 text-center text-sm-left">
                            <b class="name">এবিএম আনিছুজ্জামান</b>
                            <div>
                                ৩য় বার নির্বাচিত ও বর্তমান মেয়র, বর্তমান পৌরসভা
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
        <!--Description End-->













    </div>
@endsection
