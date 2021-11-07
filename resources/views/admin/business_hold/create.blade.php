@extends('Front.Layout.master')
@section('content')


    <section class="content">
        <div class="card card-primary website-form">
            <div class="card-header">
                <h3 class="card-title h5 m-0">ব্যবসা প্রতিষ্টান নিবন্ধন</h3>
            </div>
            <form role="form" action="{{ route('reg.business-hold') }}" method="post" enctype="multipart/form-data"
                  name="form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <h5><u>খানা প্রধানের তথ্য</u></h5>
                        <div class="row">

                            <div class="col-sm-4">
                                <label for="owner_name" class="col-form-label">নাম <span
                                        style="color: red">*</span></label>
                                <input required type="text" name="owner_name" value="{{ old('owner_name') }}"
                                       class="form-control"
                                       id="owner_name" placeholder="নাম">

                                @error('owner_name')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="gurdian_status" class="col-form-label">
                                    <select required id="gurdian_status" name="gurdian_status"><span style="color: red">*</span>
                                        <option value="father">পিতার নাম</option>
                                        <option value="husband">স্বামীর নাম</option>
                                    </select>
                                </label>
                                <span style="color: red">*</span>

                                <input required type="text" name="father_name" value="{{ old('father_name') }}"
                                       class="form-control gurdian_status" id="father_name" placeholder="পিতার  নাম">

                                @error('father_name')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror

                                @error('husband_name')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror

                            </div>

                            <div class="col-sm-4">
                                <label for="mother_name" class="col-form-label">
                                    মাতার নাম
                                </label>
                                <span style="color: red">*</span>
                                <input required type="text" class="form-control" name="mother_name"
                                       placeholder="মাতার নাম"
                                       value="{{ old('mother_name') }}">

                                @error('mother_name')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="birth_nid" class="col-form-label">
                                    <select required id="birth_nid" name="birth_nid">
                                        <option value="nid">এনআইডি নম্বর</option>
                                        <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                    </select>

                                    <span style="color: red">*</span></label>

                                <input required type="text" name="nid" value="{{ old('nid') }}"
                                       class="form-control birth_nid"
                                       id="nid_birth" autocomplete="off" placeholder="এনআইডি নম্বর">

                                @error('nid')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                                @error('birth_certificate')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>


                            <div class="col-sm-6">
                                <label for="mobile" class="col-form-label">মোবাইল<span
                                        style="color: red">*</span></label>
                                <input required type="number" name="mobile" value="{{ old('mobile') }}"
                                       class="form-control mobile"
                                       id="mobile" placeholder="মোবাইল">
                                @error('mobile')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>


                            <div class="col-sm-6">
                                <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                                <select required name="ward_id" id="ward_id" class="form-control">
                                    <option value="{{ old('owner_name') }}" selected="" disabled="">
                                        নির্বাচন করুন
                                    </option>

                                    @php
                                        $wards = DB::table('wards')
                                            ->orderBy('id', 'DESC')
                                            ->get()
                                    @endphp
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}">{{ $ward->ward_no }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('ward_id')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="road_moholla" class="col-form-label">রাস্তা/মহল্লা<span
                                        style="color: red">*</span></label>

                                <input required type="text" name="road_moholla" class="form-control" id="road_moholla"
                                       placeholder="রাস্তা/মহল্লা" value="{{ old('road_moholla') }}">
                                @error('road_moholla')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="owner_current_address" class="col-form-label">বর্তমান
                                    ঠিকানা<span style="color: red">*</span></label>

                                <input required type="text" name="owner_current_address" id="owner_current_address"
                                       class="form-control owner_current_address" placeholder="বর্তমান ঠিকানা"
                                       value="{{ old('owner_current_address') }}">
                                @error('owner_current_address')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>


                            <div class="col-sm-6">
                                <label for="owner_permanent_address" class="col-form-label">স্থায়ী
                                    ঠিকানা<span style="color: red">*</span></label>

                                <input required type="text" name="owner_permanent_address" id="owner_permanent_address"
                                       class="form-control" placeholder="স্থায়ী ঠিকানা"
                                       value="{{ old('owner_permanent_address') }}">

                                <input type="checkbox" class="same" id="same" value="same">
                                <label style="cursor: pointer;" for="same">Same as Current Address</label>

                                @error('owner_permanent_address')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror

                            </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <h5><u>ব্যবসার বিবরণ</u></h5>
                        <div class="row">

                            <div class="col-sm-6">
                                <label for="institute_name" class="col-form-label">প্রতিষ্ঠানের নাম<span
                                        style="color: red">*</span></label>

                                <input required type="text" name="institute_name" class="form-control"
                                       placeholder="প্রতিষ্ঠানের নাম" id="institute_name"
                                       value="{{ old('institute_name') }}">

                                @error('institute_name')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="business_type" class="col-form-label">ব্যবসার ধরণ</label>
                                <input required type="text" name="business_type" id="business_type" class="form-control"
                                       value="{{ old('business_type') }}" placeholder="ব্যবসার ধরণ">
                                @error('business_type')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>


                            <div class="col-sm-12">
                                <label for="institute_address" class="col-form-label">ব্যবসা প্রতিষ্ঠানের
                                    ঠিকানা<span style="color: red">*</span></label>

                                <input required type="text" name="institute_address" class="form-control"
                                       placeholder="ব্যবসা প্রতিষ্ঠানের ঠিকানা" id="institute_address"
                                       value="{{ old('institute_address') }}">
                                @error('institute_address')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>


                        </div>
                    </div>


                    <div class="form-group">
                        <h5><u>ট্রেড লাইসেন্স</u></h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="trade_fee" class="col-form-label">ফি<span
                                        style="color: red">*</span></label>
                                <input required type="number" name="trade_fee" value="{{ old('trade_fee') }}"
                                       class="form-control fee" id="trade_fee" placeholder="ফি">
                                @error('trade_fee')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="vat" class="col-form-label">ভ্যাট</label>
                                <input required type="number" name="vat" value="{{ old('vat') }}"
                                       class="form-control vat"
                                       id="vat" placeholder="ভ্যাট ১৫%" readonly="">

                            </div>

                            <div class="col-sm-6">
                                <label for="singnboard_tax" class="col-form-label">সাইনবোর্ড কর<span
                                        style="color: red">*</span></label>
                                <input required type="number" id="singnboard_tax" name="singnboard_tax"
                                       value="{{ old('singnboard_tax') }}" class="form-control singnboard_tax"
                                       placeholder="সাইনবোর্ড কর">
                                @error('singnboard_tax')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="business_tax" class="col-form-label">ব্যবসা কর<span
                                        style="color: red">*</span></label>
                                <input required type="number" name="business_tax" value="{{ old('business_tax') }}"
                                       class="form-control business_tax" id="business_tax" placeholder="ব্যবসা কর">
                                @error('business_tax')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="other" class="col-form-label">অন্যান্য<span
                                        style="color: red">*</span></label>
                                <input required type="number" name="other" value="{{ old('other') }}"
                                       class="form-control others"
                                       id="other" placeholder="অন্যান্য">
                                @error('other')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="trade_total" class="col-form-label">Total</label>
                                <input required type="number" name="trade_total" value="{{ old('trade_total') }}"
                                       class="form-control total" id="trade_total" placeholder="Total" readonly="">
                                @error('trade_total')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="last_license_issue_year" class="col-form-label">সর্বশেষ লাইসেন্স
                                    ইস্যু বছর</label>
                                <select required class="form-control" name="last_license_issue_year"
                                        id="last_license_issue_year">
                                <!-- <option value="{{ old('last_license_issue_year') }}" selected="" disabled="">নির্বাচন করুন</option>-->
                                    @for ($i = $year; $i >= 2011; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('last_license_issue_year')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="room_information form-group"></div>
                    <br>
                    <div class="form-group">

                        <h5><u>Collect Payment</u></h5>
                        @php
                            $service_charge = DB::table('service_charges')
                                ->where('id', 1)
                                ->first()
                        @endphp
                        <div class="row">
                            <div class="col-md-3">
                                <label for="service_charge_id" class="col-form-label">Register Charge <span
                                        style="color: red">*</span></label>
                                <input required type="text" name="service_charge_id" class="form-control"
                                       id="service_charge_id"
                                       placeholder="Register charge" autocomplete="off"
                                       value="{{ $service_charge->commercial_fee }}" readonly="">

                                @error('service_charge_id')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror

                            </div>
                            <div class="col-sm-4">
                                <label for="payment_type" class="col-form-label">Payment Type <span
                                        style="color: red">*</span></label>
                                <select required name="payment_type" id="payment_type" class="form-control">
                                <!--<option value="{{ old('payment_type') }}" selected="" disabled="">নির্বাচন করুন</option>-->
                                    <option value="1">Cash</option>
                                    <option value="4">Bank</option>
                                    <option value="2">Bkash</option>
                                    <option value="3">Nagad</option>
                                </select>
                                @error('payment_type')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="col-sm-6" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label for="image">Image Upload</label><br>
                                    <input type="file" name="image" accept="image/*" onchange="readURL(this);">
                                </div>
                            </div>

                            <div class="col-sm-6" style="margin-top: 10px;">
                                <img id="image" src="" style="width: 60px; height: 60px; display: none;">
                            </div>

                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary save_data">সংরক্ষণ</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content-wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('change', "#gurdian_status", function () {
                var gurdian_status = $("#gurdian_status").val();
                if (gurdian_status == 'father') {
                    $(".gurdian_status").attr("name", "father_name");
                    $(".gurdian_status").attr("placeholder", "পিতার নাম");
                    $(".birth_nid").attr("value", "{{ old('father_name') }}");
                } else {
                    $(".gurdian_status").attr("name", "husband_name");
                    $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
                    $(".birth_nid").attr("value", "{{ old('husband_name') }}");
                }
            });

            $(document).on('change', "#birth_nid", function () {
                var birth_nid = $("#birth_nid").val();
                if (birth_nid == 'nid') {
                    $(".birth_nid").attr("name", "nid");
                    $(".birth_nid").attr("placeholder", "এনআইডি");
                    $(".birth_nid").attr("value", "{{ old('nid') }}");
                } else {
                    $(".birth_nid").attr("name", "birth_certificate");
                    $(".birth_nid").attr("placeholder", "জন্ম নিবন্ধন নম্বর");
                    $(".birth_nid").attr("value", "{{ old('birth_certificate') }}");
                }
            });

            $(document).on('change', '.same', function () {
                var owner_current_address = $('.owner_current_address').val();
                var same = $('.same').val();
                var val = $(".same").prop("checked");
                if (val == true) {
                    if (owner_current_address == "") {
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

                $('.total').val(parse_fee + parse_vat + parse_singnboard_tax + parse_business_tax +
                    parse_other);
            });

            $(document).on("change", ".mobile", function () {

                var mobile = $('.mobile').val();
                var len = $('.mobile').val().length;
                if (mobile == "") {

                } else if (len == '11') {
                    $.ajax({
                        url: "{{ url('/check-mobile_hold_number') }}",

                        type: "GET",
                        data: {
                            'mobile': mobile
                        },
                        dataType: "html",
                        success: function (data) {

                            // if (data == "data_exist") {
                            //     toastr.error("Already This Mobile Number has been exist");
                            // }


                        },

                    });
                } else {
                    toastr.error("Mobile Number Should be Atleast 11 character");
                }

            });


            $(document).on('input', '.birth_nid', function () {
                var birth_nid = $('.birth_nid').val();
                var attr = $(this).attr('name');

                $.ajax({
                    url: "{{ url('/check-hold_birth_nid') }}",

                    type: "GET",
                    data: {
                        'birth_nid': birth_nid,
                        'attr': attr
                    },
                    dataType: "html",
                    success: function (data) {

                        // if (birth_nid == "") {

                        // } else if (data == 'birth_exist') {
                        //     toastr.error("Already, This Birth Certificate Number has been exist");

                        // } else if (data == 'nid_exist') {
                        //     toastr.error("Already, This National ID Number has been exist");

                        // } else {

                        // }


                    },

                });

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

        document.forms['form'].elements['ward_id'].value = [{{ old('ward_id') }}]

        document.forms['form'].elements['payment_type'].value = [{{ old('payment_type') }}]

        document.forms['form'].elements['last_license_issue_year'].value = [{{ old('last_license_issue_year') }}]
        // document.forms['form'].elements['gurdian_status'].value = [{{ old('gurdian_status') }}]
        // document.forms['form'].elements['birth_nid'].value = [{{ old('birth_nid') }}]


    </script>
@endsection
