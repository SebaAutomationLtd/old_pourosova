@extends('Front.Layout.master')
@section('content')
    <div>

        <!--Description Start-->
        <div class="welcome mb-3" id="notice">

            <div class="content-header mb-4">
                <h5 class="m-0 font-weight-bold">নোটিশ</h5>
            </div>
            <div id="" class="">

                <div>
                    <div class="notice">
                        <div class="">
                            <div class="list-group" id="list-tab" role="tablist">



                                @foreach ($notices as $notice)
                                    <a class="list-group-item " href="{{ asset($notice->file) }}"
                                        download="{{ asset($notice->file) }}">
                                        <div class="d-flex">
                                            <div>
                                                @if ($notice->category == 'নোটিশ')
                                                    <i class="fas fa-bullhorn"></i>
                                                @elseif($notice->category == 'নিয়োগ বিজ্ঞপ্তি')
                                                    <i class="fas fa-briefcase"></i>
                                                @endif

                                            </div>
                                            <div class="ml-3">
                                                {{ $notice->title }}
                                                <div>
                                                    <small>তারিখ : {{ $notice->created_at }} |
                                                        {{ $notice->category }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--Description End-->






        </div>
    </div>
@stop
