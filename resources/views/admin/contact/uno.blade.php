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
                    <i class="fa fa-fw ti-home"></i> প্রধান নির্বাহি কর্মকর্তা </a>
            </li>

        </ol>
    </section>

    <div class="row">
        @if ($count != 1)
            <div class="col-md-6">
                <div class="card main-chart">
                    <div class="card-header panel-tabs">
                        <h5>উপজেলা নির্বাহী কর্মকর্তা</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="form-group">
                                    <label for="">নাম</label>
                                    <input required name="name" type="text" class="form-control" placeholder="">
                                    <input name="department" type="hidden" value="uno" class="form-control" placeholder="">
                                    <input name="type" type="hidden" value="head" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">পদবী</label>
                                    <input required name="designation" type="text" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">ইমেইল</label>
                                    <input name="email" type="tel" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">মোবাইল নং</label>
                                    <input name="contact" type="tel" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">টেলিফোন</label>
                                    <input name="phone" type="tel" class="form-control" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="">300px * 300px এবং JPG ছবি </label>
                                    <div class="custom-file">
                                        <input required type="file" name="image" class="custom-file-input"
                                            id="customFileLang" lang="es">
                                        <label class="custom-file-label" for="customFileLang">ছবি (JPG Format, 300px *
                                            300px)</label>
                                    </div>
                                </div>
                            </div>
                            <button type="bubmit" class="btn btn-primary">সাবমিট</button>
                        </form>


                    </div>
                </div>
            </div>
        @else

            <div class="col-md-6">
                <div class="card main-chart">
                    <div class="card-header panel-tabs">
                        <h5>উপজেলা নির্বাহী কর্মকর্তা</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('department.delete', $uno->id ?? '') }}" class="btn btn-danger"
                            id="delete">Delete</a>
                        <a href="{{ route('department.unoEdit', $uno->id ?? '') }}" class="btn btn-primary">Edit</a>
                        <div class="text-center">
                            <div class="">
                                <img class=" border" src="            @if (isset($uno->image)
                                && file_exists($uno->image))
                                {{ asset($uno->image) }}@else
                                {{ asset('Front/images/photos/Shafiqul-Islam-Chowdhury.jpg') }}@endif" width="200"
                                alt="Photo">
                            </div>
                            <div class="h5">
                                {{ $uno->name ?? 'Unset' }}
                            </div>
                            <div>
                                পদবী: {{ $uno->designation ?? 'Unset' }}
                            </div>
                            <div>
                                মোবাইল: {{ $uno->contact ?? 'Unset' }}
                            </div>
                            <div>
                                টেলিফোন: {{ $uno->phone ?? 'Unset' }}
                            </div>
                            <div>
                                ইমেইল: {{ $uno->email ?? 'Unset' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
