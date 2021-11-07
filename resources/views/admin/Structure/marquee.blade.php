@extends('Admin.Layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> হেডার
                </a>
            </li>
            <li> লোগো</li>

        </ol>
    </section>
@stop
@section('css')
    <!--page level css -->
    <link href="{{ asset('Admin') }}/vendors/iCheck/css/all.css" rel="stylesheet" />

    <style>
        .previous-notice:hover {
            background: #f1f1f1;
        }

        .previous-notice {
            padding: 10px 0;
            transition: .3px;
            border-radius: 5px;
        }

        .previous-notice i {
            font-size: 20px;
        }

    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>নিউজ স্ক্রোল পরিবর্তন</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">নিউজ টাইটেল</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">নিউজ লিংক (যদি থাকে)</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>নিউজ স্ক্রোল সমূহ</h5>
                </div>
                <div class="card-body">

                    <div class="previous-notice mb-2">
                        <div class="d-flex">
                            <div class="mr-3">
                                <i class="fa fa-fw fa-check-circle-o"></i>
                            </div>
                            <div>
                                আপনার সন্তানকে টিকা দিন
                                <div>
                                    <small>04/05/2021</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="previous-notice mb-2">
                        <div class="d-flex">
                            <div class="mr-3">
                                <i class="fa fa-fw fa-check-circle-o"></i>
                            </div>
                            <div>
                                <a href="#">আপনার সন্তানকে টিকা দিন</a>
                                <div>
                                    <small>04/05/2021</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="previous-notice mb-2">
                        <div class="d-flex">
                            <div class="mr-3">
                                <i class="fa fa-fw fa-check-circle-o"></i>
                            </div>
                            <div>
                                আপনার সন্তানকে টিকা দিন
                                <div>
                                    <small>04/05/2021</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="previous-notice mb-2">
                        <div class="d-flex">
                            <div class="mr-3">
                                <i class="fa fa-fw fa-check-circle-o"></i>
                            </div>
                            <div>
                                আপনার সন্তানকে টিকা দিন
                                <div>
                                    <small>04/05/2021</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>





@stop


@section('js')
    <!-- begining of page level js -->

@stop
