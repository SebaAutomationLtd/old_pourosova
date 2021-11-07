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
    <link href="{{ asset('Admin') }}/vendors/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin') }}/css/formelements.css">
    <!--end of page level css-->
    <style>
        .logo-upload-preview {
            background: url('{{ asset('Front') }}/images/header.jpg') no-repeat;
            background-size: 100%;
            width: 100%;
            padding-left: 15px;
        }

        .logo-upload-preview img {
            max-width: 800px;
            width: 85%;
        }

    </style>
@stop

@section('content')
    <div class="card main-chart">
        <div class="card-header panel-tabs">
            <h5>হেডার লোগো পরিবর্তন</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <img class="w-100 d-block" id="background" src="{{ asset('Front') }}/images/header.jpg" alt="">
                </div>
                <div>
                    <div class="row advanced_select2">
                        <div class="col-sm-8 ">
                            <label class="control-label txt_media">
                                ছবি সিলেক্ট করুন
                            </label>
                            <input type="file" name="background" class="image-file-upload file-loading"
                                data-show-preview="false">
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-info small m-t-10">
                                এই ছবিটি ওয়েবসাইট এর মেনুবারের উপরে লোগো এর ব্যাকগ্রাউন্ড হিসেবে কাজ করবে। সাইজ 1140px *
                                128px সাইজে আপলোড েকরুন
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="logo-upload-preview py-0 py-md-2">
                        <img class="img-fluid" id="background" src="{{ asset('Front') }}/images/logo-bn.png" alt="">
                    </div>
                </div>
                <div>
                    <div class="row advanced_select2">
                        <div class="col-sm-8 ">
                            <label class="control-label txt_media">
                                লোগো এবং বাংলা টাইটেল
                            </label>
                            <input type="file" name="background" class="image-file-upload file-loading"
                                data-show-preview="false">
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-info small m-t-10">
                                অবশ্যই PNG ফরমেটে ছবি আপলোড করতে হবে। সাইজ 800px * 105px সাইজে আপলোড েকরুন
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="logo-upload-preview py-0 py-md-2">
                        <img class="img-fluid" id="background" src="{{ asset('Front') }}/images/logo-en.png" alt="">
                    </div>
                </div>
                <div>
                    <div class="row advanced_select2">
                        <div class="col-sm-8 ">
                            <label class="control-label txt_media">
                                লোগো এবং ইংরেজি টাইটেল
                            </label>
                            <input type="file" name="background" class="image-file-upload file-loading"
                                data-show-preview="false">
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-info small m-t-10">
                                অবশ্যই PNG ফরমেটে ছবি আপলোড করতে হবে। সাইজ 800px * 105px সাইজে আপলোড েকরুন
                            </div>
                        </div>
                    </div>
                </div>
            </form>




        </div>
    </div>




@stop


@section('js')
    <!-- begining of page level js -->
    <script src="{{ asset('Admin') }}/vendors/iCheck/js/icheck.js"></script>
    <script src="{{ asset('Admin') }}/vendors/bootstrap-fileinput/js/fileinput.min.js" type="text/javascript"></script>
    <script src="{{ asset('Admin') }}/vendors/bootstrap-fileinput/js/theme.js" type="text/javascript"></script>
    <script src="{{ asset('Admin') }}/js/custom_js/form_elements.js"></script>
    <script>
        $(".image-file-upload").fileinput({
            theme: "fa",
            browseClass: "btn btn-primary",
            maxFileCount: 1,
            allowedFileTypes: ["image"]
        });
    </script>
    <!-- end of page level js -->
@stop
