@extends('admin_master')
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

    </style>
@stop

@section('admin_content')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a>
                    <i class="fa fa-fw ti-home"></i> প্রশাসন বিভাগ </a>
            </li>

        </ol>
    </section>

    <div class="row">
        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>প্রশাসন বিভাগ</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('department.info') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="">ছবি আপলোড করুন </label>
                                <div class="custom-file">
                                    <input required type="file" name="image" class="custom-file-input" id="customFileLang"
                                        lang="es">
                                    <label class="custom-file-label" for="customFileLang">ছবি (JPG Format)</label>
                                </div>
                            </div>
                        </div>
                        <button type="bubmit" class="btn btn-primary">সাবমিট</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>প্রশাসন বিভাগ</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('department.infoDelete') }}" class="btn btn-danger" id="delete">Delete</a>
                    <div class="mt-4">
                        <img src="{{ asset('Front/images/info-center.jpg') }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>


@stop
