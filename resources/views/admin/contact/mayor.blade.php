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

    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>মেয়রের তথ্য</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">মেয়রের নাম</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">মোবাইল নং</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">ইমেইল</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">পিতার নাম</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">মাতার নাম</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">জন্ম তারিখ</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">বর্তমান ঠিকানা</label>
                                <textarea name="" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">স্থায়ী ঠিকানা</label>
                                <textarea name="" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">জাতীয়তা</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">ধর্ম</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">লিঙ্গ</label>
                                <select name="" class="custom-select" id="">
                                    <option value="">-- সিলেক্ট করুন --</option>
                                    <option>পুরুষ</option>
                                    <option>মহিলা</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">বৈবাহিক অবস্থা</label>
                                <select name="" class="custom-select" id="">
                                    <option value="">-- সিলেক্ট করুন --</option>
                                    <option>বিবাহিত</option>
                                    <option>অবিবাহিত</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">অর্জিত সর্বশেষ ডিগ্রী</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4 col-sm-6 col-sm-6">
                                <label for="">রক্তের গ্রুপ</label>
                                <select name="" class="custom-select" id="">
                                    <option value="">-- সিলেক্ট করুন --</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                </select>
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
                    <h5>মেয়রের প্রফেশনাল অভিজ্ঞতা</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">পদবী</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">প্রতিষ্ঠানের নাম</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary">সাবমিট</button>
                    </form>

                    <table class="table mt-4 table-bordered table-hover">
                        <tr>
                            <th>পদবী</th>
                            <th>প্রতিষ্ঠানের নাম</th>
                            <th>একশন</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <a data-placement="left" title="ডিলেট করুন" data="tooltip" class="text-danger" href="#">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <a data-placement="left" title="ডিলেট করুন" data="tooltip" class="text-danger" href="#">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <a data-placement="left" title="ডিলেট করুন" data="tooltip" class="text-danger" href="#">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <a data-placement="left" title="ডিলেট করুন" data="tooltip" class="text-danger" href="#">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    </table>
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
