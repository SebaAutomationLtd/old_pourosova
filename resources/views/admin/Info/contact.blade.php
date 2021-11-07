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
            width: 100%;
            max-width: 300px;
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

        #updateForm {
            display: none;
        }

    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>শিক্ষা প্রতিষ্ঠানের তথ্য <button id="update" class="float-right btn btn-success">আপডেট করুন</button>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div id="updateForm" class="col-md-6">
                            <form action="" method="POST">
                                <div class="">
                                    <div class="form-group">
                                        <label for="">যোগাযোগ</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">টেলিফোন</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">ইমেইল</label>
                                        <input type="text" class="form-control">
                                    </div>

                                </div>
                                <button class="btn btn-primary">সাবমিট</button>
                            </form>
                        </div>

                        <div class="col-md-6 mt-4 mt-md-0">
                            <label for="" class="font-weight-bold h5">পূর্বের তথ্য</label>
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>ঠিকানা</th>
                                    <td>ঠিকানা</td>
                                </tr>
                                <tr>
                                    <th>টেলিফোন</th>
                                    <td>ঠিকানা</td>
                                </tr>
                                <tr>
                                    <th>ইমেইল</th>
                                    <td>ঠিকানা</td>
                                </tr>
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
        $('#update').click(function() {
            $("#updateForm").css('display', 'block');
        });

        $('[data="tooltip"]').tooltip();
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop
