@extends('admin_master')
@section('admin_content')


<div class="content-wrapper">

    <section class="content  card card-primary">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px">
                <div class="col-sm-6">
                    <h4> সুবিধাভোগী নিবন্ধন করুন</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active"> সুবিধাভোগী নিবন্ধন করুন</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="website-form form-group">
                        <div class="card-header">
                            <h3 class="card-title"> সুবিধাভোগী করুন</h3>
                        </div>
                        <form role="form" action="{{URL::to('/store-beneficial')}}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                            <div class="row ">
                                <div class="col-sm-4">
                                    <label for="name" class="col-form-label">নাম <span style="color: red">*</span></label>
                                    <input type="text" name="name" value="" class="form-control" id="name" placeholder="নাম" autocomplete="off" required="">
                                </div>
                                <div class="col-sm-4" id="father_name">
                                    <label for="father_name" class="col-form-label">
                                        <select id="gurdian_status" name="gurdian_status" required="">
                                            <option value="father">পিতার নাম </option>
                                            <option value="husband">স্বামীর নাম</option>
                                        </select>
                                        <span style="color: red">*</span></label>
                                    <input type="text" name="father_name" value="" class="form-control gurdian_status" id="father_name" autocomplete="off" placeholder="পিতার নাম ">
                                </div>

                                <div class="col-sm-4">
                                    <label for="mother_name" class="col-form-label">মাতার নাম <span style="color: red">*</span></label>
                                    <input type="text" name="mother_name" value="" class="form-control" id="mother_name" placeholder="মায়ের নাম" autocomplete="off" required="">
                                </div>

                                

                               



                                <div class="col-sm-4">
                                    <label for="nid_birth" class="col-form-label">
                                        <select id="birth_nid" name="birth_nid">
                                            <option value="nid">এনআইডি নম্বর</option>
                                            <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                        </select>
                                        <span style="color: red">*</span></label>
                                    <input type="text" name="nid" value="" class="form-control birth_nid" id="nid_birth" autocomplete="off" placeholder="এনআইডি নম্বর">
                                </div>

                                <div class="col-sm-4">
                                    <label for="mobile" class="col-form-label">মোবাইল<span style="color: red">*</span></label>
                                    <input type="number" name="mobile" value="" class="form-control" id="mobile" placeholder="মোবাইল" autocomplete="off" required="">
                                </div>


                                <div class="col-sm-4">
                                    <label for="beneficial_type" class="col-form-label">ভাতা নির্বাচন করুন <span style="color: red">*</span></label>
                                    <select name="beneficial_type" id="beneficial_type" class="form-control" required="">
                                    	<option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                                        <option value="1">বয়স্ক ভাতা</option>
                                        <option value="2">বিধবা ভাতা</option>
                                        <option value="3">হতদরিদ্র ভাতা</option>
                                    </select>
                                </div>
                                
                            </div>
                            <br />

                            <div class="form-group">  
                                <!-- Addess Information -->
                                <div class="form-group">
                                    <h5><u>ঠিকানার তথ্য</u> </h5>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                                            <select name="ward_id" id="ward_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                @php
                                                $wards = DB::table('wards')->orderBy('id', 'DESC')->get();
                                                @endphp
                                                @foreach($wards as $ward)
                                                <option value="{{$ward->id}}">{{$ward->ward_no}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="village_id" class="col-form-label">গ্রাম </label>
                                            <select name="village_id" id="village_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">নির্বাচন করুন</option>

                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="holding_no" class="col-form-label">হোল্ডিং নং <span style="color: red">*</span> </label>
                                            <input type="text" name="holding_no" value="" class="form-control" id="holding_no" placeholder="হোল্ডিং নং" autocomplete="off" required="">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="post_code_id" class="col-form-label">পোস্ট কোড</label>
                                            <select name="post_code_id" id="post_code_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                                                @php
                                                $post_code = DB::table('post_codes')->orderBy('id', 'DESC')->get();
                                                @endphp
                                                @foreach($post_code as $row)
                                                <option value="{{$row->id}}">{{$row->post_code}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="post_office_id" class="col-form-label">ডাক ঘর</label>
                                            <select name="post_office_id" id="post_office_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                              
                            </div>

                    </div>
                    <div style="padding: 10px 0px 25px">
                        <button type="submit" class="btn btn-primary save_data">সংরক্ষণ</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('change', "#gurdian_status", function() {
            var gurdian_status = $("#gurdian_status").val();
            if (gurdian_status == 'father') {
                $(".gurdian_status").attr("name", "father_name");
                $(".gurdian_status").attr("placeholder", "পিতার নাম");
            } else {
                $(".gurdian_status").attr("name", "husband_name");
                $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
            }
        });

        $(document).on('change', "#birth_nid", function() {
            var birth_nid = $("#birth_nid").val();
            if (birth_nid == 'nid') {
                $(".birth_nid").attr("name", "nid");
                $(".birth_nid").attr("placeholder", "এনআইডি");
            } else {
                $(".birth_nid").attr("name", "birth_certificate");
                $(".birth_nid").attr("placeholder", "জন্ম নিবন্ধন নম্বর");
            }
        });

        $(document).on('change', '#ward_id', function() {
            var id = $('#ward_id').val();
            $.ajax({
                url: "{{  url('/get-village/') }}/" + id,

                type: "GET",
                dataType: "html",
                success: function(data) {


                    if (data == 'no_data') {
                        toastr.error("Sorry, No Data Found");
                        $("#village_id").html('<option value="" selected="" disabled="">নির্বাচন করুন</option>');
                    } else {
                        $("#village_id").html(data);
                    }





                },

            });
        });


        $(document).on('change', '#post_code_id', function() {
            var id = $('#post_code_id').val();
            $.ajax({
                url: "{{  url('/get-post_office/') }}/" + id,

                type: "GET",
                dataType: "html",
                success: function(data) {


                    if (data == 'no_data') {
                        toastr.error("Sorry, No Data Found");
                        $("#post_office_id").html('<option value="" selected="" disabled="">--নির্বাচন করুন--</option>');
                    } else {
                        $("#post_office_id").html(data);
                    }






                },

            });
        });
       

        $(document).on('input', '#mobile', function() {
            var mobile = $('#mobile').val();
            $.ajax({
                url: "{{  url('/check-mobile_number') }}",

                type: "GET",
                data: {
                    'mobile': mobile
                },
                dataType: "html",
                success: function(data) {



                    // if (data == 'data_exist') {
                    //     toastr.error("Already, This Number has been exist");
                    //     $('.save_data').css('cursor', 'not-allowed');
                    // } else {
                    //     $('.save_data').css('cursor', 'pointer');
                    // }



                },

            });
        });

        $(document).on('input', '.birth_nid', function() {
            var birth_nid = $('.birth_nid').val();
            var attr = $(this).attr('name');

            $.ajax({
                url: "{{  url('/check-birth_nid') }}",

                type: "GET",
                data: {
                    'birth_nid': birth_nid,
                    'attr': attr
                },
                dataType: "html",
                success: function(data) {

                    // if (birth_nid == "") {
                    //     $('.save_data').css('cursor', 'pointer');
                    // } else if (data == 'birth_exist') {
                    //     toastr.error("Already, This Birth Certificate Number has been exist");
                    //     $('.save_data').css('cursor', 'not-allowed');
                    // } else if (data == 'nid_exist') {
                    //     toastr.error("Already, This National ID Number has been exist");
                    //     $('.save_data').css('cursor', 'not-allowed');
                    // } else {
                    //     $('.save_data').css('cursor', 'pointer');
                    // }


                },

            });
        });

    });

</script>

@endsection
