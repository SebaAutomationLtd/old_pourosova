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
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>নোটিশ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('notice.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">শিরোনাম</label>
                                <input required name="title" value="{{ $notice->title }}" type="text" class="form-control"
                                    placeholder="">
                                <input type="hidden" value="download" name="type">
                                <input type="hidden" value="{{ $notice->id }}" name="id">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label for="">নোটিশের ধরন</label>
                                <select required name="category" id="type" class="custom-select">
                                    <option value="">-- সিলেক্ট করুন --</option>
                                    <option {{ $notice->category == 'ফরম' ? 'selected' : '' }}>ফরম</option>
                                    <option {{ $notice->category == 'সিটিজেন চার্টার' ? 'selected' : '' }}>সিটিজেন চার্টার
                                    </option>
                                    <option {{ $notice->category == 'এক নজরে' ? 'selected' : '' }}>এক নজরে</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label for="">প্রকাশনা</label>
                                <select required name="status" id="type" class="custom-select">
                                    <option value="">-- সিলেক্ট করুন --</option>
                                    <option value="1" {{ $notice->status == '1' ? 'selected' : '' }}>প্রকাশ করুন</option>
                                    <option value="0" {{ $notice->status == '0' ? 'selected' : '' }}>পরবর্তিতে প্রকাশ
                                        করুন</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">ফাইল আপলোড করুন </label>
                            <div class="custom-file">
                                <input name="file" type="file" class="custom-file-input" id="customFileLang" lang="es">
                                @php
                                    if (file_exists($notice->file)) {
                                        $file = 1;
                                    } else {
                                        $file = 0;
                                    }
                                @endphp
                                @if ($file == 1)
                                    <label class="custom-file-label text-primary" for="customFileLang">ফাইল আপলোড করা আছে
                                    </label>
                                @else
                                    <label class="custom-file-label text-danger" for="customFileLang">ফাইল আপলোড করা নেই
                                @endif

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">সাবমিট</button>
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
    <script>
        $('[data="tooltip"]').tooltip();
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $('#notice').DataTable();
    </script>
@stop
