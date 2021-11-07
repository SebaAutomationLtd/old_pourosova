@extends('Front.Layout.master')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px">
        <div class="col-sm-6">
            <h4>{{$title}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">রেজিস্ট্রেশন</a></li>
                <li class="breadcrumb-item active"> {{$title}}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <center>{{Session::get('message')}}</center>
            </div>
            @endif
            <div class="website-form form-group">
                <!--                <div class="card-header">
                                    <h3 class="card-title"> বসতবাড়ী হোল্ডিং নিবন্ধন করুন</h3>
                                </div>-->
                <form role="form" action="{{route('store.storebusinessholdinfo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="owner_name" class="col-form-label">নাম <span style="color: red">*</span></label>
                            <input type="text" name="owner_name" oninput="fullName(this.id);" maxlength="30"  class="form-control" id="owner_name" placeholder="নাম">
                        </div>
                        <div class="col-sm-4">
                            <label for="father_name" class="col-form-label">
                                <select id="gurdian_status" name="gurdian_status"><span style="color: red">*</span>
                                    <option value="father">পিতার নাম </option>
                                    <option value="husband">স্বামীর নাম</option>
                                </select>
                            </label>
                            <span style="color: red">*</span>
                            <input type="text" name="father_name" value="" class="form-control gurdian_status" id="father_name" placeholder="পিতার  নাম">
                        </div>
                        <div class="col-sm-4">
                            <label for="mother_name" class="col-form-label">
                                মাতার নাম
                            </label>
                            <span style="color: red">*</span>
                            <input type="text" class="form-control" name="mother_name" placeholder="মাতার নাম">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="nid_birth" class="col-form-label">
                                <select id="birth_nid" name="birth_nid" class="getbirthnid">
                                    <option value="nid">এনআইডি নম্বর</option>
                                    <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                </select>
                                <span style="color: red">*</span></label>
                            <input type="text" name="nid" value="" class="form-control birth_nid" id="nid_birth" placeholder="এনআইডি নম্বর">
                        </div>
                        <div class="col-sm-3">
                            <label for="mobile" class="col-form-label">মোবাইল<span style="color: red">*</span></label>
                            <input type="text" oninput="contactNumber(this.id);" maxlength="11" name="mobile" value="" class="form-control mobile" id="mobile" placeholder="মোবাইল" required="">
                        </div>
                        <div class="col-sm-3">
                            <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                            <select name="ward_id" id="ward_id" class="form-control">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @php
                                $wards = DB::table('wards')->orderBy('id', 'DESC')->get();
                                @endphp
                                @foreach($wards as $ward)
                                <option value="{{$ward->id}}">{{$ward->ward_no}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="road_moholla" class="col-form-label">রাস্তা/মহল্লা<span style="color: red">*</span></label>
                            <input type="text" name="road_moholla" class="form-control" id="road_moholla" placeholder="রাস্তা/মহল্লা">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="owner_current_address" class="col-form-label">বর্তমান ঠিকানা<span style="color: red">*</span></label>
                            <input type="text" name="owner_current_address" id="owner_current_address" class="form-control owner_current_address" placeholder="বর্তমান ঠিকানা">
                        </div>
                        <div class="col-sm-6">
                            <label for="owner_permanent_address" class="col-form-label">স্থায়ী ঠিকানা<span style="color: red">*</span></label>
                            <input type="text" name="owner_permanent_address" id="owner_permanent_address" class="form-control" placeholder="স্থায়ী ঠিকানা">
                            <input type="checkbox" class="same" id="same" value="same">
                            <label style="cursor: pointer;" for="same">Same as Current Address</label>

                        </div>
                    </div>
                    <h5 style="padding-top: 15px"><u>ব্যবসার বিবরণ</u></h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="institute_name" class="col-form-label">প্রতিষ্ঠানের নাম<span style="color: red">*</span></label>
                            <input type="text" name="institute_name" class="form-control" placeholder="প্রতিষ্ঠানের নাম" id="institute_name">
                        </div>
                        <div class="col-sm-6">
                            <label for="business_type" class="col-form-label">ব্যবসার ধরণ</label>
                            <input type="text" name="business_type" id="business_type" class="form-control" placeholder="ব্যবসার ধরণ" required="">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="institute_address" class="col-form-label">ব্যবসা প্রতিষ্ঠানের ঠিকানা<span style="color: red">*</span></label>

                            <input type="text" name="institute_address" class="form-control" placeholder="ব্যবসা প্রতিষ্ঠানের ঠিকানা" id="institute_address" required="">
                        </div>
                    </div><br>
                    <div class="form-group">
                        <h5><u>ব্যবসা নিবন্ধন</u> </h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="trade_fee" class="col-form-label">ফি<span style="color: red">*</span></label>
                                <input type="number" name="trade_fee" value="" class="form-control fee" id="trade_fee" placeholder="ফি">
                            </div>
                            <div class="col-sm-6">
                                <label for="vat" class="col-form-label">ভ্যাট</label>
                                <input type="number" name="vat" value="" class="form-control vat" id="vat" placeholder="১৫%" readonly="">
                            </div>
                            <div class="col-sm-6">
                                <label for="singnboard_tax" class="col-form-label">সাইনবোর্ড কর<span style="color: red">*</span></label>
                                <input type="number" name="singnboard_tax" value="" class="form-control singnboard_tax" id="singnboard_tax" placeholder="সাইনবোর্ড কর">
                            </div>
                            <div class="col-sm-6">
                                <label for="business_tax" class="col-form-label">ব্যবসা কর<span style="color: red">*</span></label>
                                <input type="number" name="business_tax" value="" class="form-control business_tax" id="business_tax" placeholder="ব্যবসা কর">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="other" class="col-form-label">অন্যান্য<span style="color: red">*</span></label>
                                <input type="number" name="other" value="" class="form-control others" id="other" placeholder="অন্যান্য">
                            </div>
                            <div class="col-sm-4">
                                <label for="trade_total" class="col-form-label">মোট</label>
                                <input type="number" name="trade_total" value="" class="form-control total" id="trade_total" readonly="">
                            </div>
                            <div class="col-sm-4">
                                <label for="last_license_issue_year" class="col-form-label">সর্বশেষ লাইসেন্স ইস্যু বছর</label>
                                <select class="form-control" name="last_license_issue_year" id="last_license_issue_year" required>
                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                    @for($i=date('Y'); $i>=2011; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <h5><u>পেমেন্ট সংগ্রহ করুন</u></h5>
                        @php
                        $service_charge = DB::table('service_charges')->where('id',1)->first();
                        @endphp
                        <div class="row">
                            <div class="col-md-4">
                                <label for="service_charge" class="col-form-label">নিবন্ধন চার্জ (টাকা)</label>
                                <input type="text" name="service_charge_id" class="form-control" id="service_charge_id" placeholder="Register charge" value="{{$service_charge->commercial_fee}}" readonly="">
                            </div>
                            <div class="col-sm-4">
                                <label for="payment_type" class="col-form-label">পেমেন্ট প্রকার <span style="color: red">*</span></label>
                                <select name="payment_type" id="payment_type" class="form-control">
                                    <option value="" selected disabled>নির্বাচন করুন</option>
                                    <option value="1">Cash</option>
                                    <option value="4">Bank</option>
                                    <option value="2">Bkash</option>
                                    <option value="3">Nagad</option>
                                </select>
                            </div>
                            <div class="col-sm-6" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label for="image">ছবি আপলোড</label><br>
                                    <input type="file" name="image" accept="image/*" onchange="readURL(this);">
                                </div>
                            </div>
                            <div class="col-sm-6" style="margin-top: 10px;">
                                <img id="image" src="" style="width: 60px; height: 60px; display: none;">
                            </div>
                        </div>
                    </div><br><br>
                    <center>
                        <div style="" id="showSubmitButton">
                            <button onclick="return confirm('আপনি নিশ্চিত যে উপরের সকল তথ্য সঠিক ?')" type="submit" class="btn btn-primary save_data pull-right">সংরক্ষণ</button>
                        </div>
                    </center>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('form').attr('autocomplete', 'off');
    });
    $(document).ready(function () {
        $(document).on('change', "#gurdian_status", function () {
            var gurdian_status = $("#gurdian_status").val();
            if (gurdian_status === 'father') {
                $(".gurdian_status").attr("name", "father_name");
                $(".gurdian_status").attr("placeholder", "পিতার নাম");
            } else {
                $(".gurdian_status").attr("name", "husband_name");
                $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
            }
        });
        $(document).on('change', "#birth_nid", function () {
            var birth_nid = $("#birth_nid").val();
            if (birth_nid === 'nid') {
                $(".birth_nid").attr("name", "nid");
                $(".birth_nid").attr("placeholder", "এনআইডি");
            } else {
                $(".birth_nid").attr("name", "birth_certificate");
                $(".birth_nid").attr("placeholder", "জন্ম নিবন্ধন নম্বর");
            }
        });
        //NID/Birth No Validation
        $(document).on('blur', '.birth_nid', function () {
            var number = $(this).val();
            var value = $('.getbirthnid').val();
            if (value === 'nid') {
                var dataname = 'NID';
            } else {
                var dataname = 'Birth';
            }
            $.get('{{URL::to("getbusinessduplicatebirthnid")}}' + '/' + dataname + '/' + number, function (data) {
                if (data !== 'No') {
                    alert(data);
                    $("#showSubmitButton").hide();
                } else {
                    $("#showSubmitButton").show();
                }
            });
        });
        //Mobile No Validation
        $(document).on('blur', '.mobile', function () {
            var mobile = $(this).val();
            $.get('{{URL::to("getbusinessduplicatenumber")}}' + '/' + mobile, function (data) {
                if (data !== 'No') {
                    alert(data);
                    $("#showSubmitButton").hide();
                } else {
                    $("#showSubmitButton").show();
                }
            });
        });


        $(document).on('change', '.same', function () {
            var owner_current_address = $('.owner_current_address').val();
            var same = $('.same').val();
            var val = $(".same").prop("checked");
            if (val === true) {
                if (owner_current_address === "") {
                    alert("Please Write Current Address");
                    $('.same').prop('checked', false);
                    $('#owner_permanent_address').val('');
                } else {
                    $('#owner_permanent_address').val(owner_current_address);
                }
            } else {
                $('#owner_permanent_address').val('');
            }

        });
        $(document).on('input', '.fee', function () {
            var fee = $('.fee').val();
            var parse_fee = parseInt(fee);
            var vat = 15;
            var parse_val = parseInt(vat);
            $('.total').val(parse_fee * vat / 100 + parse_fee);
        });
        $(document).on('input', '.singnboard_tax', function () {
            var singnboard_tax = $('.singnboard_tax').val();
            var parse_singnboard_tax = parseInt(singnboard_tax);
            var fee = $('.fee').val();
            var parse_fee = parseInt(fee);
            var vat = 15;
            var parse_vat = parseInt(vat);
            $('.total').val(parse_fee + parse_vat + parse_singnboard_tax);
        });

        $(document).on('input', '.business_tax', function () {
            var business_tax = $('.business_tax').val();
            var parse_business_tax = parseInt(business_tax);
            var singnboard_tax = $('.singnboard_tax').val();
            var parse_singnboard_tax = parseInt(singnboard_tax);
            var fee = $('.fee').val();
            var parse_fee = parseInt(fee);
            var vat = 15;
            var parse_vat = parseInt(vat);
            $('.total').val(parse_fee + parse_vat + parse_singnboard_tax + parse_business_tax);
        });

        $(document).on('input', '.others', function () {
            var other = $('.others').val();
            var parse_other = parseInt(other);
            var business_tax = $('.business_tax').val();
            var parse_business_tax = parseInt(business_tax);
            var singnboard_tax = $('.singnboard_tax').val();
            var parse_singnboard_tax = parseInt(singnboard_tax);
            var fee = $('.fee').val();
            var parse_fee = parseInt(fee);
            var vat = 15;
            var parse_vat = parseInt(vat);
            $('.total').val(parse_fee + parse_vat + parse_singnboard_tax + parse_business_tax + parse_other);
        });
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#image").css("display", "block");
                $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function fullName(id) {
        // Only Capital or Small Chracters will write
        var element = document.getElementById(id);
        var regex = /[0-9,<>?/;:'",-=@#$%^&*()_+{}]/gi;
        element.value = element.value.replace(regex, "");
    }
    //Contact Number Validate
    function contactNumber(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
</script>
@if (Session::has('message'))
<script>
    //Redirect To Home Page
    function pagereloadfunction() {
        window.location.href = "{{URL::to('/')}}";
    }
    setTimeout(pagereloadfunction, 3000);
</script>
@endif
@stop
