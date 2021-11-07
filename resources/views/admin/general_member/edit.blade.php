@extends('admin_master')
@section('admin_content')


    <div class="content-wrapper">


        <section class="content  card card-primary">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px">
                    <div class="col-sm-6">
                        <h4> বসতবাড়ী হোল্ডিং আপডেট করুন</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">হোম</a></li>
                            <li class="breadcrumb-item active"> বসতবাড়ী হোল্ডিং আপডেট করুন</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class=" website-form form-group">
                            <div class="card-header">
                                <h3 class="card-title"> বসতবাড়ী হোল্ডিং আপডেট করুন</h3>
                            </div>
                            <form role="form" action="{{ route('update.general_member', $edit->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <h5><u>খানা প্রধানের তথ্য</u></h5>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-form-label">নাম <span
                                                style="color: red">*</span></label>
                                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control"
                                            id="name" placeholder="নাম" autocomplete="off">

                                            @error('name')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror

                                    </div>
                                    <div class="col-sm-4" id="father_name">
                                        <label for="father_name" class="col-form-label">
                                            <select id="gurdian_status" name="gurdian_status">
                                                <option value="father" <?php if ($edit->husband_name == null) {
    echo 'selected';
} ?>>পিতার নাম </option>
                                                <option value="husband" <?php if ($edit->father_name == null) {
    echo 'selected';
} ?>>স্বামীর নাম</option>
                                            </select>
                                            <span style="color: red">*</span></label>
                                        @if ($edit->husband_name == null)
                                            <input type="text" name="father_name" value="{{ $edit->father_name }}"
                                                class="form-control gurdian_status" id="father_name" autocomplete="off"
                                                placeholder="পিতার নাম ">

                                                @error('father_name')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            @else
                                            <input type="text" name="husband_name" value="{{ $edit->husband_name }}"
                                                class="form-control gurdian_status" id="husband_name" autocomplete="off"
                                                placeholder="স্বামীর নাম ">

                                                @error('husband_name')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                        @endif
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="mother_name" class="col-form-label">মাতার নাম <span
                                                style="color: red">*</span></label>
                                        <input type="text" name="mother_name" value="{{ $edit->mother_name }}"
                                            class="form-control" id="mother_name" placeholder="মায়ের নাম"
                                            autocomplete="off">

                                            @error('mother_name')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="inputPassword3" class="col-form-label">লিঙ্গ <span
                                                style="color: red">*</span></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="1" <?php if ($edit->gender == '1') {
    echo 'selected';
} ?>>পুরুষ</option>
                                            <option value="2" <?php if ($edit->gender == '2') {
    echo 'selected';
} ?>>মহিলা</option>
                                            <option value="3" <?php if ($edit->gender == '3') {
    echo 'selected';
} ?>>অন্যান্য</option>
                                        </select>

                                        @error('gender')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="inputPassword3" class="col-form-label">বৈবাহিক অবস্থা<span
                                                style="color: red">*</span></label>
                                        <select name="martial_status" id="martial_status" class="form-control">
                                            <option value="1" <?php if ($edit->martial_status == '1') {
    echo 'selected';
} ?>>বিবাহিত</option>
                                            <option value="2" <?php if ($edit->martial_status == '2') {
    echo 'selected';
} ?>>অবিবাহিত</option>
                                            <option value="3" <?php if ($edit->martial_status == '3') {
    echo 'selected';
} ?>>বিধবা</option>
                                        </select>

                                        @error('martial_status')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ</label>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <select name="day" id="day" class="form-control"  >
                                                    <option>Day</option>
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}" <?php if ($edit->day == $i) {
    echo 'selected';
} ?>>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>

                                                @error('day')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <select name="month" id="month" class="form-control"  >
                                                    <option>Month</option>
                                                    <option value="1" <?php if ($edit->month == '1') {
    echo 'selected';
} ?>>January</option>
                                                    <option value="2" <?php if ($edit->month == '2') {
    echo 'selected';
} ?>>February</option>
                                                    <option value="3" <?php if ($edit->month == '3') {
    echo 'selected';
} ?>>March</option>
                                                    <option value="4" <?php if ($edit->month == '4') {
    echo 'selected';
} ?>>April</option>
                                                    <option value="5" <?php if ($edit->month == '5') {
    echo 'selected';
} ?>>May</option>
                                                    <option value="6" <?php if ($edit->month == '6') {
    echo 'selected';
} ?>>June</option>
                                                    <option value="7" <?php if ($edit->month == '7') {
    echo 'selected';
} ?>>July</option>
                                                    <option value="8" <?php if ($edit->month == '8') {
    echo 'selected';
} ?>>August</option>
                                                    <option value="9" <?php if ($edit->month == '9') {
    echo 'selected';
} ?>>September</option>
                                                    <option value="10" <?php if ($edit->month == '10') {
    echo 'selected';
} ?>>October</option>
                                                    <option value="11" <?php if ($edit->month == '11') {
    echo 'selected';
} ?>>November</option>
                                                    <option value="12" <?php if ($edit->month == '12') {
    echo 'selected';
} ?>>December</option>
                                                </select>
                                                @error('month')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <select name="year" id="year" class="form-control"  >
                                                    <option>Year</option>
                                                    @for ($i = $year; $i >= 1900; $i--)
                                                        <option value="{{ $i }}" <?php if ($edit->year == $i) {
    echo 'selected';
} ?>>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('year')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-sm-3">
                                        <label for="nid_birth" class="col-form-label">
                                            <select id="birth_nid" name="birth_nid">
                                                <option value="nid" <?php if ($edit->birth_certificate == null) {
    echo 'selected';
} ?>>এনআইডি নম্বর</option>
                                                <option value="birth_id_no" <?php if ($edit->nid == null) {
    echo 'selected';
} ?>>জন্ম নিবন্ধন নম্বর</option>
                                            </select>
                                            <span style="color: red">*</span></label>
                                        @if ($edit->birth_certificate == null)
                                            <input type="text" name="nid" value="{{ $edit->nid }}"
                                                class="form-control birth_nid" id="nid_birth" autocomplete="off"
                                                placeholder="এনআইডি নম্বর">

                                                @error('nid')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror

                                        @else
                                            <input type="text" name="birth_certificate"
                                                value="{{ $edit->birth_certificate }}" class="form-control birth_nid"
                                                id="nid_birth" autocomplete="off" placeholder="এনআইডি নম্বর">

                                                @error('birth_certificate')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror

                                        @endif
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="mobile" class="col-form-label">মোবাইল<span
                                                style="color: red">*</span></label>
                                        <input type="number" name="mobile" class="form-control" id="mobile"
                                            placeholder="মোবাইল" autocomplete="off" value="{{ $edit->mobile }}">

                                            @error('mobile')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="religion_id" class="col-form-label">Religion <span
                                                style="color: red">*</span></label>
                                        <select name="religion_id" id="religion_id" class="form-control"  >
                                            <option value="" selected="" disabled>Select</option>
                                            <option value="1" <?php if ($edit->religion_id == '1') {
    echo 'selected';
} ?>>ইসলাম</option>
                                            <option value="2" <?php if ($edit->religion_id == '2') {
    echo 'selected';
} ?>>হিন্দু</option>
                                            <option value="3" <?php if ($edit->religion_id == '3') {
    echo 'selected';
} ?>>বৌদ্ধধর্ম</option>
                                            <option value="4" <?php if ($edit->religion_id == '4') {
    echo 'selected';
} ?>>খ্রিস্টান</option>
                                        </select>

                                        @error('religion_id')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <label for="family_class">পরিবারের শ্রেণী</label>
                                            <select id="family_class" name="family_class" class="form-control">
                                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                <option value="1" <?php if ($edit->family_class == '1') {
    echo 'selected';
} ?>>উচ্চ ভিত্ত</option>
                                                <option value="2" <?php if ($edit->family_class == '2') {
    echo 'selected';
} ?>>মধ্যবিত্ত</option>
                                                <option value="3" <?php if ($edit->family_class == '3') {
    echo 'selected';
} ?>>দরিদ্র </option>
                                                <option value="4" <?php if ($edit->family_class == '4') {
    echo 'selected';
} ?>>হতদরিদ্র</option>
                                            </select>

                                            @error('family_class')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-sm-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <label for="family_class">পরিবারের জনসংখ্যা (পুরুষ)</label>
                                            <input value="{{ $edit->member_male }}" name="member_male" type="number"
                                                class="form-control" placeholder="পরিবারের জনসংখ্যা (পুরুষ)">

                                                @error('member_male')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <label for="family_class">পরিবারের জনসংখ্যা (মহিলা)</label>
                                            <input value="{{ $edit->member_female }}" name="member_female" type="number"
                                                class="form-control" placeholder="পরিবারের জনসংখ্যা (মহিলা)">

                                                @error('member_female')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                        </div>
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
                                                <select name="ward_id" id="ward_id" class="form-control"  >
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                    @php
                                                        $wards = DB::table('wards')
                                                            ->orderBy('id', 'DESC')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($wards as $ward)
                                                        <option value="{{ $ward->id }}" <?php if ($edit->ward_id == $ward->id) {
    echo 'selected';
} ?>>
                                                            {{ $ward->ward_no }}</option>
                                                    @endforeach
                                                </select>

                                                @error('ward_id')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="village_id" class="col-form-label">গ্রাম </label>
                                                <select name="village_id" id="village_id" class="form-control"
                                                     >
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                    @php
                                                        $villages = DB::table('villages')
                                                            ->orderBy('id', 'DESC')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($villages as $village)
                                                        <option value="{{ $village->id }}" <?php if ($edit->village_id == $village->id) {
    echo 'selected';
} ?>>
                                                            {{ $village->village_name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('village_id')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="holding_no" class="col-form-label">হোল্ডিং নং <span
                                                        style="color: red">*</span> </label>
                                                <input type="text" name="holding_no" value="{{ $edit->holding_no }}"
                                                    class="form-control" id="holding_no" placeholder="হোল্ডিং নং"
                                                    autocomplete="off">

                                                    @error('holding_no')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="post_code_id" class="col-form-label">পোস্ট কোড</label>
                                                <select name="post_code_id" id="post_code_id" class="form-control"
                                                     >
                                                    <option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                                                    @php
                                                        $post_code = DB::table('post_codes')
                                                            ->orderBy('id', 'DESC')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($post_code as $row)
                                                        <option value="{{ $row->id }}" <?php if ($edit->post_code_id == $row->id) {
    echo 'selected';
} ?>>
                                                            {{ $row->post_code }}</option>
                                                    @endforeach
                                                </select>
                                                @error('post_code_id')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="post_office_id" class="col-form-label">ডাক ঘর</label>
                                                <select name="post_office_id" id="post_office_id" class="form-control">
                                                    <option value="" selected="" disabled="">--নির্বাচন করুন--</option>

                                                    @php
                                                        $post_offices = DB::table('post_offices')
                                                            ->orderBy('id', 'DESC')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($post_offices as $row)
                                                        <option value="{{ $row->id }}" <?php if ($edit->post_office_id == $row->id) {
    echo 'selected';
} ?>>
                                                            {{ $row->post_office }}</option>
                                                    @endforeach
                                                </select>
                                                @error('post_office_id')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="post_office_id" class="col-form-label">বিদ্যুৎ সুবিধাভোগি
                                                    কিনা?</label>
                                                <select name="biddut"   class="form-control">
                                                    <option value="">নির্বাচন করুন</option>
                                                    <option {{ $edit->biddut == 1 ? 'selected' : '' }} value="1">হ্যা
                                                    </option>
                                                    <option {{ $edit->biddut == 2 ? 'selected' : '' }} value="2">না
                                                    </option>
                                                </select>
                                                @error('biddut')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="post_office_id" class="col-form-label">স্যানিটেশনের তথ্য</label>
                                                <select name="sanitation"   class="form-control">
                                                    <option value="">
                                                        নির্বাচন করুন</option>
                                                    <option {{ $edit->sanitation == 1 ? 'selected' : '' }} value="1">পাকা
                                                    </option>
                                                    <option {{ $edit->sanitation == 2 ? 'selected' : '' }} value="2">কাচা
                                                    </option>
                                                    <option {{ $edit->sanitation == 3 ? 'selected' : '' }} value="3">
                                                        অস্বাস্থ্যকর</option>
                                                </select>
                                                @error('sanitation')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>


                                        </div>
                                    </div>

                                    <!-- Other Information -->
                                    <div class="form-group">
                                        <h5><u>অন্যান্য তথ্য</u> </h5>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="type_house" class="col-form-label">বাড়ির ধরণ<span
                                                        style="color: red">*</span></label>
                                                <input type="hidden" name="house_tax_rate" id="house_tax_rate"
                                                    value="{{ $edit->house_year_value }}">

                                                <select name="type_house" id="type_house" class="form-control">
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                    <option value="1" <?php if ($edit->type_house == '1') {
    echo 'selected';
} ?>>পাকা</option>
                                                    <option value="2" <?php if ($edit->type_house == '2') {
    echo 'selected';
} ?>>আধা পাকা</option>
                                                    <option value="3" <?php if ($edit->type_house == '3') {
    echo 'selected';
} ?>>টিনশেড</option>
                                                    <option value="4" <?php if ($edit->type_house == '4') {
    echo 'selected';
} ?>>কাচা</option>
                                                </select>
                                                @error('type_house')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="number_room" class="col-form-label">রুম পরিমাণ<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="number_room" value="{{ $edit->number_room }}"
                                                    class="form-control" id="number_room" placeholder="রুম পরিমাণ"
                                                    autocomplete="off">

                                                    @error('number_room')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="height" class="col-form-label">দৈর্ঘ<span style="color: red">*</span></label>
                                                <input type="text" name="height" value="{{$edit->height ?? ''}}" class="form-control @error('height') is-invalid @enderror" placeholder="দৈর্ঘ" autocomplete="off" >
                                                @error('height')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label for="wide" class="col-form-label">প্রস্থ<span style="color: red">*</span></label>
                                                <input type="text" name="wide" value="{{$edit->wide ?? ''}}" class="form-control @error('wide') is-invalid @enderror" placeholder="প্রস্থ" autocomplete="off" >
                                                @error('wide')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="house_year_value" class="col-form-label">বাড়ির বার্ষিক
                                                    মান</label>
                                                <input type="number" name="house_year_value"
                                                    value="{{ $edit->house_year_value }}"
                                                    class="form-control house_year_value" id="house_annual_val"
                                                    placeholder="বাড়ির বার্ষিক মান" autocomplete="off">

                                                    @error('house_year_value')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="yearly_vat" class="col-form-label">বার্ষিক কর</label>

                                                <input type="number" name="yearly_vat" class="form-control yearly_vat"
                                                    readonly="" value="{{ $edit->yearly_vat }}">


                                            </div>

                                            <div class="col-sm-4">
                                                <label for="occupation_id" class="col-form-label"  >পেশা </label>

                                                <select name="occupation_id" id="occupation_id" class="form-control">
                                                    @php
                                                        $occupation = DB::table('occupations')
                                                            ->where('status', 1)
                                                            ->get();
                                                    @endphp
                                                    @foreach ($occupation as $row)
                                                        <option value="{{ $row->id }}" <?php if ($edit->occupation_id == $row->id) {
    echo 'selected';
} ?>
                                                            {{ $row->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('occupation_id')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="last_tax_year" class="col-form-label">সর্বশেষ ট্যাক্স পরিশোধ
                                                    অর্থবছর</label>
                                                <select name="last_tax_year" id="last_tax_year" class="form-control"
                                                     >
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                    <option value="{{ $year }}" <?php if ($edit->last_tax_year == $year) {
    echo 'selected';
} ?>>
                                                        {{ $year }}</option>
                                                    <option value="2020" <?php if ($edit->last_tax_year == '2020') {
    echo 'selected';
} ?>>2020</option>
                                                    <option value="2019" <?php if ($edit->last_tax_year == '2019') {
    echo 'selected';
} ?>>2019</option>
                                                    <option value="2018" <?php if ($edit->last_tax_year == '2018') {
    echo 'selected';
} ?>>2018</option>
                                                    <option value="2017" <?php if ($edit->last_tax_year == '2017') {
    echo 'selected';
} ?>>2017</option>
                                                    <option value="2016" <?php if ($edit->last_tax_year == '2016') {
    echo 'selected';
} ?>>2016</option>
                                                    <option value="2015" <?php if ($edit->last_tax_year == '2015') {
    echo 'selected';
} ?>>2015</option>
                                                    <option value="2014" <?php if ($edit->last_tax_year == '2014') {
    echo 'selected';
} ?>>2014</option>
                                                    <option value="2013" <?php if ($edit->last_tax_year == '2013') {
    echo 'selected';
} ?>>2013</option>
                                                    <option value="2012" <?php if ($edit->last_tax_year == '2012') {
    echo 'selected';
} ?>>2012</option>
                                                    <option value="2011" <?php if ($edit->last_tax_year == '2011') {
    echo 'selected';
} ?>>2011</option>
                                                    <option value="2010" <?php if ($edit->last_tax_year == '2010') {
    echo 'selected';
} ?>>2010</option>
                                                </select>
                                                @error('last_tax_year')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                        </div>

                                        <!-- Other Information -->
                                        <br>
                                        <div class="form-group">
                                            <h5><u>পেমেন্ট সংগ্রহ করুন</u> </h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="service_charge" class="col-form-label">নিবন্ধন চার্জ<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" name="service_charge"
                                                        value="{{ $edit->service_charge }}" class="form-control"
                                                        id="service_charge" placeholder="নিবন্ধন চার্জ" autocomplete="off">

                                                        @error('service_charge')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="payment_type" class="col-form-label">পেমেন্ট প্রকার <span
                                                            style="color: red">*</span></label>
                                                    <select name="payment_type" id="payment_type" class="form-control"
                                                         >
                                                        <option value="" selected disabled>নির্বাচন করুন</option>
                                                        <option value="1" <?php if ($edit->payment_type == '1') {
    echo 'selected';
} ?>>নগদ</option>
                                                        <option value="4" <?php if ($edit->payment_type == '4') {
    echo 'selected';
} ?>>ব্যাংক</option>
                                                        <option value="2" <?php if ($edit->payment_type == '2') {
    echo 'selected';
} ?>>বিকাশ</option>

                                                    </select>

                                                    @error('payment_type')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">আপডেট</button>
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
                    url: "{{ url('/get-village/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function(data) {


                        if (data == 'no_data') {
                            toastr.error("Sorry, No Data Found");
                            $("#village_id").html(
                                '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                            );
                        } else {
                            $("#village_id").html(data);
                        }





                    },

                });
            });


            $(document).on('change', '#post_code_id', function() {
                var id = $('#post_code_id').val();
                $.ajax({
                    url: "{{ url('/get-post_office/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function(data) {


                        if (data == 'no_data') {
                            toastr.error("Sorry, No Data Found");
                            $("#post_office_id").html(
                                '<option value="" selected="" disabled="">--নির্বাচন করুন--</option>'
                            );
                        } else {
                            $("#post_office_id").html(data);
                        }






                    },

                });
            });
            //house_tax_rate
            $(document).on('change', '#type_house', function() {
                var id = $("#type_house").val();
                var house_tax_rate = $("#house_tax_rate").val();
                $.ajax({
                    url: "{{ url('/get-house_tax_rate/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function(data) {



                        $("#house_tax_rate").val(data);



                    },

                });
            });

            $(document).on('input', '.house_year_value', function() {
                var type_house = $("#type_house").val();
                var house_year_value = $('.house_year_value').val();

                var house_tax_rate = $("#house_tax_rate").val();
                var parse_house_tax_rate = parseInt(house_tax_rate);
                var parse_house_year_value = parseInt(house_year_value);
                var result = parse_house_year_value + parse_house_year_value * parse_house_tax_rate / 100;

                $(".yearly_vat").val(result);




            });

            $(document).on('input', '#mobile', function() {
                var mobile = $('#mobile').val();
                $.ajax({
                    url: "{{ url('/check-mobile_number') }}",

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
                    url: "{{ url('/check-birth_nid') }}",

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
