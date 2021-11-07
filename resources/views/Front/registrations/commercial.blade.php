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
                    <form role="form" action="{{route('reg.commercial-hold')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="col-form-label">হোল্ডিং ধরন <span style="color: red">*</span></label>
                                <select required name="hold_type" class="form-control" required="">
                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                    <option value="সরকারী প্রতিষ্টান">সরকারী প্রতিষ্টান</option>
                                    <option value="বেসরকারী প্রতিষ্টান">বেসরকারী প্রতিষ্টান</option>
                                    <option value="ব্যক্তি মালিকানাধীন">ব্যক্তি মালিকানাধীন</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="owner_name" class="col-form-label">নাম <span
                                        style="color: red">*</span></label>
                                <input required type="text" name="owner_name" oninput="fullName(this.id);"
                                       maxlength="30"
                                       class="form-control" id="owner_name" placeholder="নাম">
                            </div>
                            <div class="col-sm-4">
                                <label for="father_name" class="col-form-label">
                                    <select required id="gurdian_status" name="gurdian_status">
                                        <option value="father">পিতার নাম</option>
                                        <option value="husband">স্বামীর নাম</option>
                                    </select>
                                </label>
                                <span style="color: red">*</span>
                                <input required type="text" name="father_name" value=""
                                       class="form-control gurdian_status"
                                       id="father_name" placeholder="পিতার  নাম">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ <span style="color: red">*</span></label>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <select required name="day" id="day" class="form-control" required="">
                                            <option selected="" disabled>দিন</option>
                                            @for ($i = 1; $i <=31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select required name="month" id="month" class="form-control" required="">
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
                                        <select required name="year" id="year" class="form-control" required="">
                                            <option selected="" disabled>বছর</option>
                                            @for ($i = date('Y'); $i >= 1900; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="nid_birth" class="col-form-label">
                                    <select required id="birth_nid" name="birth_nid" class="getbirthnid">
                                        <option value="nid">এনআইডি নম্বর</option>
                                        <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                    </select>
                                    <span style="color: red">*</span></label>
                                <input required type="text" name="nid" value="" class="form-control birth_nid"
                                       id="nid_birth"
                                       placeholder="এনআইডি নম্বর">
                            </div>
                            <div class="col-sm-4">
                                <label for="mobile" class="col-form-label">মোবাইল<span
                                        style="color: red">*</span></label>
                                <input required type="text" oninput="contactNumber(this.id);" maxlength="11"
                                       name="mobile"
                                       value="" class="form-control mobile" id="mobile" placeholder="মোবাইল"
                                       required="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                                <select required name="ward_id" id="ward_id" class="form-control">
                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                    @php
                                        $wards = DB::table('wards')->orderBy('id', 'DESC')->get()
                                    @endphp
                                    @foreach($wards as $ward)
                                        <option value="{{$ward->id}}">{{$ward->ward_no}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="holding_no" class="col-form-label">হোল্ডিং নং <span
                                        style="color: red">*</span></label>
                                <input required type="text" name="holding_no" class="form-control" id="road_moholla"
                                       placeholder="হোল্ডিং নং">
                            </div>
                            <div class="col-md-3">
                                <label for="type_house" class="col-form-label">বাড়ির ধরণ<span
                                        style="color: red">*</span></label>
                                <input required type="hidden" name="house_tax_rate" id="house_tax_rate">
                                <select required name="type_house" id="type_house" class="form-control"
                                        required="">
                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                    @foreach ($housetypes as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="number_room" class="col-form-label">রুম পরিমাণ <span
                                        style="color: red">*</span></label>
                                <input required type="number" min="1" name="number_room" value="" class="form-control"
                                       id="number_room" placeholder="রুম পরিমাণ"
                                       required="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="length_number" class="col-form-label">দৈর্ঘ (ফুট) <span
                                        style="color: red">*</span></label>
                                <input required type="text" min="1" name="length_number" value="" class="form-control"
                                       id="length_number" placeholder="দৈর্ঘ পরিমান"
                                       required="">
                            </div>
                            <div class="col-md-3">
                                <label for="width_number" class="col-form-label">প্রস্থ (ফুট) <span
                                        style="color: red">*</span></label>
                                <input required type="text" min="1" name="width_number" value="" class="form-control"
                                       id="width_number" placeholder="প্রস্থ পরিমান"
                                       required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="house_year_value" class="col-form-label">বাৎসরিক মূল্যায়ন
                                    মান <span style="color: red">*</span></label>
                                <input required type="number" min="1" name="house_year_value"
                                       class="form-control house_year_value" id="house_year_value"
                                       placeholder="বাৎসরিক মূল্যায়ন" required="">
                            </div>
                            <div class="col-sm-3">
                                <label for="yearly_vat" class="col-form-label">বার্ষিক কর</label>
                                <input required type="number" name="yearly_vat" class="form-control yearly_vat"
                                       readonly="" required="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="last_tax_year" class="col-form-label">সর্বশেষ ট্যাক্স পরিশোধ
                                    অর্থবছর <span style="color: red">*</span></label>
                                <select required name="last_tax_year" id="last_tax_year" class="form-control"
                                        required="">
                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                    @for ($i = date('Y'); $i >= 2010; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            @php
                                $service_charge = DB::table('service_charges')->where('id',1)->first()
                            @endphp
                            <div class="col-md-4">
                                <label for="service_charge" class="col-form-label">নিবন্ধন চার্জ (টাকা)</label>
                                <input required type="text" name="service_charge" id="service_charge"
                                       value="{{$service_charge->general_fee}}" class="form-control" readonly="">
                            </div>
                            <div class="col-sm-4">
                                <label for="payment_type" class="col-form-label">পেমেন্ট প্রকার <span
                                        style="color: red">*</span></label>
                                <select required name="payment_type" id="payment_type" class="form-control" required>
                                    <option value="" selected disabled>নির্বাচন করুন</option>
                                    <option value="Nagad">নগদ</option>
                                    <option value="Bank">ব্যাংক</option>
                                    <option value="bKash">বিকাশ</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <center>
                            <div style="" id="showSubmitButton">
                                <button onclick="return confirm('আপনি নিশ্চিত যে উপরের সকল তথ্য সঠিক ?')" type="submit"
                                        class="btn btn-primary save_data pull-right">সংরক্ষণ
                                </button>
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
                $.get('{{URL::to("getcomercialduplicatebirthnid")}}' + '/' + dataname + '/' + number, function (data) {
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
                $.get('{{URL::to("getcomercialduplicatenumber")}}' + '/' + mobile, function (data) {
                    if (data !== 'No') {
                        alert(data);
                        $("#showSubmitButton").hide();
                    } else {
                        $("#showSubmitButton").show();
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
