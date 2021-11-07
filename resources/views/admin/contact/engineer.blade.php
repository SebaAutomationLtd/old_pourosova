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
                    <i class="fa fa-fw ti-home"></i> প্রকৌশল বিভাগ </a>
            </li>

        </ol>
    </section>

    <div class="row">
        @if ($count != 1)
            <div class="col-md-6">
                <div class="card main-chart">
                    <div class="card-header panel-tabs">
                        <h5>প্রকৌশল বিভাগ</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="form-group">
                                    <label for="">নাম</label>
                                    <input required name="name" type="text" class="form-control" placeholder="">
                                    <input name="department" type="hidden" value="engineer" class="form-control"
                                        placeholder="">
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
                        <h5>প্রকৌশল বিভাগ</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('department.delete', $engineer->id ?? '') }}" class="btn btn-danger"
                            id="delete">Delete</a>
                        <a href="{{ route('department.engineerEdit', $engineer->id ?? '') }}"
                            class="btn btn-primary">Edit</a>
                        <div class="text-center">
                            <div class="">
                                <img class=" border" src="                                   
                                                                                                   
                                         @if (isset($engineer->image) &&
                                file_exists($engineer->image))
                                {{ asset($engineer->image) }}@else
                                {{ asset('Front/images/photos/Shafiqul-Islam-Chowdhury.jpg') }}@endif" width="200"
                                alt="Photo">
                            </div>
                            <div class="h5">
                                {{ $engineer->name ?? 'Unset' }}
                            </div>
                            <div>
                                পদবী: {{ $engineer->designation ?? 'Unset' }}
                            </div>
                            <div>
                                মোবাইল: {{ $engineer->contact ?? 'Unset' }}
                            </div>
                            <div>
                                টেলিফোন: {{ $engineer->phone ?? 'Unset' }}
                            </div>
                            <div>
                                ইমেইল: {{ $engineer->email ?? 'Unset' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>


    <div class="card main-chart mt-4">
        <div class="card-header panel-tabs">
            <h5>অন্যান্য কর্মকর্তা</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">নাম</label>
                        <input name="name" type="text" class="form-control" placeholder="">
                        <input name="department" type="hidden" value="engineer" class="form-control" placeholder="">
                        <input name="type" type="hidden" value="others" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">পদবী</label>
                        <input name="designation" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">মোবাইল</label>
                        <input name="contact" type="tel" class="form-control" placeholder="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">সাবমিট</button>
            </form>

            <div class="mt-4">
                <table class="table table-striped table-bordered responsive nowrap table-hover" id="employee"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th> ক্রমিক </th>
                            <th>নাম</th>
                            <th>পদবী</th>
                            <th>মোবাইল নং</th>
                            <th>একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($others as $k => $other)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                <td>{{ $other->name }}</td>
                                <td>{{ $other->designation }}</td>
                                <td>{{ $other->contact }}</td>
                                <td>
                                    <a title="এডিট করুন" data="tooltip" class="btn btn-primary"
                                        href="{{ route('department.engineerEdit', $other->id) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a title="ডিলেট করুন" data="tooltip" class="btn btn-danger" id="delete"
                                        href="{{ route('department.delete', $other->id) }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
