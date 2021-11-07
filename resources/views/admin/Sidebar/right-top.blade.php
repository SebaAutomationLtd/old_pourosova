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
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin') }}/vendors/datatables/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin') }}/css/custom_css/datatables_custom.css">
    <link rel="stylesheet" href="{{ asset('Admin') }}/css/responsive.dataTables.min.css">
    <style>
        .previous-notice {
            transition: .3px;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .previous-notice:hover {
            color: #6699cc;
        }


        .table-data img {
            height: 60px;
            width: 60px;
        }

        .previous-notice .action i {
            font-size: 20px;
        }

        .dropdown-menu {
            transform: translate3d(0, 0, 0) !important;
        }

        .btn:focus {
            box-shadow: none !important;
            outline: 0;
        }

        #desc {
            display: none;
        }

    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-8">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>উপরের ব্যানার</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">


                        <div class="form-group">
                            <label for="">JPG ছবি </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">ছবি (JPG Format)</label>
                            </div>
                        </div>

                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>উপরের ব্যানার</h5>
                </div>
                <div class="card-body">
                    <img class="rounded d-block w-100" src="{{ asset('Front') }}/images//photos/mayor.jpg" alt="">
                </div>
            </div>
        </div>


    </div>





@stop


@section('js')
    <!-- begining of page level js -->

@stop
