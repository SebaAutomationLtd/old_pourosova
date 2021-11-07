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
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>বর্তমান ও সাবেক মেয়র</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">নাম</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">পদবী</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="">মোবাইল নং</label>
                                <input type="tel" class="form-control" placeholder="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">মেয়রের ক্রম</label>
                                <select name="" id="" class="custom-select">
                                    <option>-- কত তম মেয়র সিলেক্ট করুন --</option>
                                    <option>প্রথম</option>
                                    <option>দ্বিতীয়</option>
                                    <option>তৃতীয়</option>
                                    <option>চতুর্থ</option>
                                    <option>পঞ্চম</option>
                                    <option>ষষ্ঠ</option>
                                    <option>সপ্তম</option>
                                    <option>অষ্টম</option>
                                    <option>নবম</option>
                                    <option>দশম</option>
                                    <option>একাদশ</option>
                                    <option>দ্বাদশ</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">300px * 300px এবং JPG ছবি </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                    <label class="custom-file-label" for="customFileLang">ছবি (JPG Format, 300px *
                                        300px)</label>
                                </div>
                            </div>
                        </div>


                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
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
