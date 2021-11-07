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

        .image {
            position: relative;
        }

        .image-no {
            position: absolute;
            z-index: 5;
            display: inline-block;
            width: 60px;
            text-align: left;
            height: 60px;
            background-color: rgba(0, 0, 0, .7);
            border-radius: 0 0 60px 0;
            font-weight: bold;
            font-size: 27px;
            color: #fff;
            padding-left: 10px;
            padding-top: 7px;
            font-family: roboto;
        }

    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>হোম পেইজ স্লাইডার</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-sm-4 col-md-2">
                                <label for="">ছবির সিরিয়াল</label>
                                <select id="type" class="custom-select">
                                    <option value="">-- সিলেক্ট --</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-8 col-md-10">
                                <label for="">JPG ছবি (500px * 300px)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                    <label class="custom-file-label" for="customFileLang">ছবি (JPG Format) (500px *
                                        300px)</label>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>হোম পেইজ স্লাইডার</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="image col-md-6 mt-4">
                            <span class="image-no">01</span>
                            <img src="{{ asset('Front') }}/images//slider/slider2.jpg" class="d-blok w-100 rounded border"
                                alt="">
                        </div>
                        <div class="image col-md-6 mt-4">
                            <span class="image-no">02</span>
                            <img src="{{ asset('Front') }}/images//slider/slider2.jpg" class="d-blok w-100 rounded border"
                                alt="">
                        </div>
                        <div class="image col-md-6 mt-4">
                            <span class="image-no">03</span>
                            <img src="{{ asset('Front') }}/images//slider/slider2.jpg" class="d-blok w-100 rounded border"
                                alt="">
                        </div>
                        <div class="image col-md-6 mt-4">
                            <span class="image-no">04</span>
                            <img src="{{ asset('Front') }}/images//slider/slider2.jpg" class="d-blok w-100 rounded border"
                                alt="">
                        </div>

                    </div>


                </div>
            </div>
        </div>


    </div>





@stop


@section('js')
    <!-- begining of page level js -->
    <script type="text/javascript" src="{{ asset('Admin') }}/vendors/datatables/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{ asset('Admin') }}/vendors/datatables/js/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('Admin') }}/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="{{ asset('Admin') }}/js/custom_js/datatables_custom.js"></script>
    <script>
        $('[data="tooltip"]').tooltip();
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop
