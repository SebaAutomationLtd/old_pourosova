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
                    <h5>প্রকৌশল বিভাগ</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('department.unoEdit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="">নাম</label>
                                <input required name="name" value="{{ $engineer->name }}" type="text" class="form-control"
                                    placeholder="">
                                <input name="department" type="hidden" value="engineer" class="form-control" placeholder="">
                                <input name="id" type="hidden" value="{{ $engineer->id }}" class="form-control"
                                    placeholder="">
                                <input name="type" type="hidden" value="{{ $engineer->type }}" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">পদবী</label>
                                <input required name="designation" value="{{ $engineer->designation }}" type="text"
                                    class="form-control" placeholder="">
                            </div>
                            @if ($engineer->type == 'head')
                                <div class="form-group">
                                    <label for="">ইমেইল</label>
                                    <input name="email" type="tel" value="{{ $engineer->email }}" class="form-control"
                                        placeholder="">
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">মোবাইল নং</label>
                                <input name="contact" type="tel" value="{{ $engineer->contact }}" class="form-control"
                                    placeholder="">
                            </div>
                            @if ($engineer->type == 'head')
                                <div class="form-group">
                                    <label for="">টেলিফোন</label>
                                    <input name="phone" type="tel" value="{{ $engineer->phone }}" class="form-control"
                                        placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="">300px * 300px এবং JPG ছবি </label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFileLang"
                                            lang="es">
                                        @if (file_exists($engineer->image))
                                            <label class="custom-file-label text-success" for="customFileLang">আপলোড করা
                                                আছে</label>
                                        @else
                                            <label class="custom-file-label text-danger" for="customFileLang">আপলোড করা নেই
                                            </label>
                                        @endif

                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="bubmit" class="btn btn-primary">সাবমিট</button>
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
