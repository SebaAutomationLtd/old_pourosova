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
                <form role="form" action="{{ route('store.nagorikshebainfo') }}" method="post">
                    @csrf
                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name" class="col-form-label">নাম <span style="color: red">*</span></label>
                            <input type="text" name="name" oninput="fullName(this.id);" maxlength="30" class="form-control" id="name" placeholder="নাম" required="">
                        </div>
                        <div class="col-sm-4" id="father_name">
                            <label for="father_name" class="col-form-label">
                                <select id="gurdian_status" name="gurdian_status" required="">
                                    <option value="father">পিতার নাম </option>
                                    <option value="husband">স্বামীর নাম</option>
                                </select>
                                <span style="color: red">*</span></label>
                            <input type="text" name="father_name" value="" class="form-control gurdian_status" id="father_name" placeholder="পিতার নাম " required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="mother_name" class="col-form-label">মাতার নাম <span style="color: red">*</span></label>
                            <input type="text" name="mother_name" value="" class="form-control" id="mother_name" placeholder="মায়ের নাম" required="">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="inputPassword3" class="col-form-label">লিঙ্গ <span style="color: red">*</span></label>
                            <select name="gender" id="gender" class="form-control" required="">
                                <option value="" selected="" disabled>নির্বাচন করুন </option>
                                <option value="1">পুরুষ</option>
                                <option value="2">মহিলা</option>
                                <option value="3">অন্যান্য</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="inputPassword3" class="col-form-label">বৈবাহিক অবস্থা <span style="color: red">*</span></label>
                            <select name="martial_status" id="martial_status" class="form-control" required="">
                                <option value="" selected="" disabled>নির্বাচন করুন </option>
                                <option value="1">বিবাহিত</option>
                                <option value="2">অবিবাহিত</option>
                                <option value="3">বিধবা</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ <span style="color: red">*</span></label>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <select name="day" id="day" class="form-control" required="">
                                        <option selected="" disabled>দিন</option>
                                        @for ($i = 1; $i <=31; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="month" id="month" class="form-control" required="">
                                        <option selected="" disabled>মাস</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="year" id="year" class="form-control" required="">
                                        <option selected="" disabled>বছর</option>
                                        @for ($i = date('Y'); $i >= 1900; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="nid_birth" class="col-form-label">
                                <select id="birth_nid" name="birth_nid" class="getbirthnid">
                                    <option value="nid">এনআইডি নম্বর</option>
                                    <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                </select>
                                <span style="color: red">*</span><span style="color: red">*</span></label>
                            <input type="number" min="1" name="nid" value="" class="form-control birth_nid" id="nid_birth"
                                   placeholder="এনআইডি নম্বর" required="">
                        </div>
                        <div class="col-sm-3">
                            <label for="mobile" class="col-form-label">মোবাইল  নম্বর <span style="color: red">*</span><span style="color: red">*</span></label>
                            <input type="text" oninput="contactNumber(this.id);" maxlength="11" class="form-control mobilenumber" id="mobile"
                                   placeholder="মোবাইল" required="">
                        </div>
                        <div class="col-sm-3">
                            <label for="religion_id" class="col-form-label">ধর্ম <span
                                    style="color: red">*</span></label>
                            <select name="religion_id" id="religion_id" class="form-control" required="">
                                <option value="" selected="" disabled>নির্বাচন করুন</option>
                                <option value="1">ইসলাম</option>
                                <option value="2">হিন্দু</option>
                                <option value="3">বৌদ্ধধর্ম</option>
                                <option value="4">খ্রিস্টান</option>
                            </select>
                        </div>
                        <div class="col-sm-3" style="margin-top: 5px;">
                            <div class="form-group">
                                <label for="family_class">পরিবারের শ্রেণী <span style="color: red">*</span></label>
                                <select id="family_class" name="family_class" class="form-control"
                                        required="">
                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                    <option value="1">উচ্চ ভিত্ত</option>
                                    <option value="2">মধ্যবিত্ত</option>
                                    <option value="3">দরিদ্র </option>
                                    <option value="4">হতদরিদ্র</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" style="margin-top: 5px;">
                            <div class="form-group">
                                <label for="family_class">পরিবারের জনসংখ্যা (পুরুষ) <span style="color: red">*</span></label>
                                <input name="member_male" type="number" min="1" class="form-control"
                                       placeholder="পরিবারের জনসংখ্যা (পুরুষ)" required="">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 5px;">
                            <div class="form-group">
                                <label for="family_class">পরিবারের জনসংখ্যা (মহিলা) <span style="color: red">*</span></label>
                                <input name="member_female" type="number" min="1" class="form-control"
                                       placeholder="পরিবারের জনসংখ্যা (মহিলা)" required="">
                            </div>
                        </div>
                    </div>
                    <h5><u>ঠিকানার তথ্য</u> </h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="ward_id" class="col-form-label">ওয়ার্ড নং <span style="color: red">*</span></label>
                            <select name="ward_id" id="ward_id" class="form-control" required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($wards as $ward)
                                <option value="{{ $ward->id }}">{{ $ward->ward_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="village_id" class="col-form-label">গ্রাম <span style="color: red">*</span></label>
                            <select name="village_id" id="setvillageid" class="form-control"required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="holding_no" class="col-form-label">হোল্ডিং নং <span
                                    style="color: red">*</span> </label>
                            <input type="text" name="holding_no" value="" class="form-control"
                                   id="holding_no" placeholder="হোল্ডিং নং" required="">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="post_code_id" class="col-form-label">পোস্ট কোড <span style="color: red">*</span></label>
                            <select name="post_code_id" id="post_code_id" class="form-control"
                                    required="">
                                <option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                                @foreach ($post_code as $row)
                                <option value="{{ $row->id }}">{{ $row->post_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="post_office_id" class="col-form-label">ডাক ঘর <span style="color: red">*</span></label>
                            <select name="post_office_id" id="setpostofficeid" class="form-control" required="">
                                <option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="post_office_id" class="col-form-label">বিদ্যুৎ সুবিধাভোগি
                                কিনা? <span style="color: red">*</span></label>
                            <select name="biddut" required class="form-control">
                                <option value="">নির্বাচন করুন</option>
                                <option value="1">হ্যা</option>
                                <option value="2">না</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="post_office_id" class="col-form-label">স্যানিটেশনের তথ্য <span style="color: red">*</span></label>
                            <select name="sanitation" required class="form-control">
                                <option value="">নির্বাচন করুন</option>
                                <option value="1">পাকা</option>
                                <option value="2">কাচা</option>
                                <option value="3">অস্বাস্থ্যকর</option>
                            </select>
                        </div>
                    </div><br>
                    <h5><u>অন্যান্য তথ্য</u> </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="type_house" class="col-form-label">বাড়ির ধরণ<span
                                    style="color: red">*</span></label>
                            <input type="hidden" name="house_tax_rate" id="house_tax_rate">
                            <select name="type_house" id="type_house" class="form-control"
                                    required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($housetypes as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="length_number" class="col-form-label">দৈর্ঘ (ফুট) <span style="color: red">*</span></label>
                            <input type="text" min="1" name="length_number" value="" class="form-control"
                                   id="length_number" placeholder="দৈর্ঘ পরিমান"
                                   required="">
                        </div>
                        <div class="col-md-3">
                            <label for="width_number" class="col-form-label">প্রস্থ (ফুট) <span style="color: red">*</span></label>
                            <input type="text" min="1" name="width_number" value="" class="form-control"
                                   id="width_number" placeholder="প্রস্থ পরিমান"
                                   required="">
                        </div>
                        <div class="col-md-3">
                            <label for="number_room" class="col-form-label">রুম পরিমাণ <span style="color: red">*</span></label>
                            <input type="number" min="1" name="number_room" value="" class="form-control"
                                   id="number_room" placeholder="রুম পরিমাণ"
                                   required="">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="house_year_value" class="col-form-label">বাড়ির বার্ষিক
                                মান <span style="color: red">*</span></label>
                            <input type="number" min="1" name="house_year_value"
                                   class="form-control house_year_value" id="house_year_value"
                                   placeholder="বাড়ির বার্ষিক মান" required="">
                        </div>
                        <div class="col-sm-3">
                            <label for="yearly_vat" class="col-form-label">বার্ষিক কর</label>

                            <input type="number" name="yearly_vat" class="form-control yearly_vat"
                                   readonly="" required="">
                        </div>
                        <div class="col-sm-3">
                            <label for="occupation_id" class="col-form-label" required>পেশা <span style="color: red">*</span></label>

                            <select name="occupation_id" id="occupation_id" class="form-control" required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($occupation as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="last_tax_year" class="col-form-label">সর্বশেষ ট্যাক্স পরিশোধ
                                অর্থবছর <span style="color: red">*</span></label>
                            <select name="last_tax_year" id="last_tax_year" class="form-control"
                                    required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @for ($i = date('Y'); $i >= 2010; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div><br>
                    <h5><u>পেমেন্ট সংগ্রহ করুন</u> </h5>
                    <div class="row">
                        @php
                        $service_charge = DB::table('service_charges')->where('id',1)->first();
                        @endphp
                        <div class="col-md-4">
                            <label for="service_charge" class="col-form-label">নিবন্ধন চার্জ (টাকা)</label>
                            <input type="text" name="service_charge" id="service_charge" value="{{$service_charge->general_fee}}" class="form-control" readonly="">
                        </div>
                        <div class="col-sm-4">
                            <label for="payment_type" class="col-form-label">পেমেন্ট প্রকার <span style="color: red">*</span></label>
                            <select name="payment_type" id="payment_type" class="form-control" required>
                                <option value="" selected disabled>নির্বাচন করুন</option>
                                <option value="1">নগদ</option>
                                <option value="4">ব্যাংক</option>
                                <option value="2">বিকাশ</option>
                            </select>
                        </div>
                    </div><br><br>
                    <center>
                        <div id="showSubmitButton">
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
            $.get('{{URL::to("getduplicatebirthnid")}}' + '/' + dataname + '/' + number, function (data) {
                if (data !== 'No') {
                    alert(data);
                    $("#showSubmitButton").hide();
                } else {
                    $("#showSubmitButton").show();
                }
            });
        });
        //Mobile No Validation
        $(document).on('blur', '.mobilenumber', function () {
            var mobile = $(this).val();
            $.get('{{URL::to("getduplicatenumber")}}' + '/' + mobile, function (data) {
                if (data !== 'No') {
                    alert(data);
                    $("#showSubmitButton").hide();
                } else {
                    $("#showSubmitButton").show();
                }
            });
        });
        $(document).on('change', '#ward_id', function () {
            var id = $(this).val();
            $.get('{{URL::to("getvillageinfo")}}' + '/' + +id, function (data) {
                if (data === 'no_data') {
                    alert("Sorry, No Data Found");
                    $("#setvillageid").html(
                            '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                            );
                } else {
                    $("#setvillageid").html(data);
                }
            });
        });
        $(document).on('change', '#post_code_id', function () {
            var id = $(this).val();
            $.get('{{URL::to("getpostofficeinfo")}}' + '/' + +id, function (data) {
                if (data === 'no_data') {
                    alert("Sorry, No Data Found");
                    $("#setpostofficeid").html(
                            '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                            );
                } else {
                    $("#setpostofficeid").html(data);
                }
            });
        });
        //house Tax Rate
        $(document).on('change', '#type_house', function () {
            var id = $("#type_house").val();
            $.get('{{URL::to("get_house_tax_rate")}}' + '/' + +id, function (data) {
                $("#house_tax_rate").val(data);
            });
        });

        $(document).on('input', '.house_year_value', function () {
            var house_year_value = $(this).val();
            var house_tax_rate = $("#house_tax_rate").val();
            var result = parseInt(house_year_value) + parseInt(house_year_value) * parseInt(house_tax_rate) / 100;
            if (house_tax_rate === "") {
                alert("Please Select a House Type");
                $('.house_year_value').val('');
            } else {
                $(".yearly_vat").val(result);
            }
        });

    });
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
