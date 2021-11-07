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

    </style>
@stop

@section('content')
    <div class="row">


        <div class="col-md-12">
            <div class="card main-chart mt-4">
                <div class="card-header panel-tabs">
                    <h5>কাউন্সিলর বৃন্দ</h5>
                </div>
                <div class="card-body">
                    <div class="">

                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover" id="sample_1"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th data-priority="1">ছবি</th>
                                        <th data-priority="2">নাম</th>
                                        <th>পদবী</th>
                                        <th>মোবাইল নং</th>
                                        <th data-priority="3">ওয়ার্ড </th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>
                                            <img class="rounded" src="{{ asset('Front') }}/images//photos/mayor.jpg"
                                                alt="">
                                        </td>
                                        <td>মোঃ রফিকুল ইসলাম</td>
                                        <td>কাউন্সিলর</td>
                                        <td>০১৭৩৩-০০০০০০</td>
                                        <td>ওয়ার্ড ০১</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a data-placement="left" title="বিস্তারিত দেখুন" data="tooltip"
                                                        class="dropdown-item text-primary" href="#">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary  dropdown-item" href="#">
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $("#summernote").summernote({
            placeholder: 'কাউন্সিলরের বাণী ...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
        $('[data="tooltip"]').tooltip();
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@stop
