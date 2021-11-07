@extends('Front.Layout.master')
@section('content')
    <div>

        <!--Description Start-->
        <div class="welcome mb-3">
            <div class="content-header">
                <h5 class="m-0 font-weight-bold">এক নজরে</h5>
            </div>
            <div class="padding-15">

                @if(isset($notice->file))
                <a href="{{ asset($notice->file) }}" download="{{ asset($notice->file) }}" class=" btn
                            btn-outline-success mt-4">ডাউনলোড
                </a>
                @endif

            </div>
        </div>
        <!--Description End-->

    </div>
@stop
