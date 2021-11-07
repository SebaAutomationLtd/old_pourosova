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
        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>ডান পাশের ব্যানার সমূহ</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">শিরোনাম</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">তথ্যের ধরন</label>
                            <select id="type" class="custom-select">
                                <option value="1">ছবি</option>
                                <option value="2">বর্ণনা</option>
                            </select>
                        </div>
                        <div id="desc" class="form-group">
                            <label for="">বর্ণনা লিখুন</label>
                            <textarea class="form-control"></textarea>
                        </div>

                        <div id="banner" class="form-group">
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

        <div class="col-md-6">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>ডান পাশের ব্যানার সমূহ</h5>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th data-priority="1">শিরোনাম</th>
                                        <th>তথ্য</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>
                                            ডিজিটাল দিবস
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ asset('Front') }}/images//photos/mayor.jpg">
                                                <img class="rounded" src="{{ asset('Front') }}/images//photos/mayor.jpg"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="#">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>


                                                </div>
                                            </div>

                                        </td>
                                    </tr>





                                </tbody>
                            </table>
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

        $("#type").change(function() {
            if ($(this).val() == 1) {
                $('#banner').css('display', 'block');
                $('#desc').css('display', 'none');
            } else {
                $('#banner').css('display', 'none');
                $('#desc').css('display', 'block');
            }
        });
    </script>
@stop
