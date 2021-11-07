@extends('admin_master')
@section('admin_content')


<div class="content-wrapper">

    <section class="content  card card-primary">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px">
                <div class="col-sm-6">
                    <h4> ভাতা নির্বাচন করুন</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active"> ভাতা নির্বাচন করুন</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="website-form form-group">
                        <div class="card-header">
                            <h3 class="card-title"> ভাতা নির্বাচন করুন</h3>
                        </div>
                      <form action="{{URL::to('/select-allowance')}}" method="post">
                      	@csrf
                      <div class="form-group" style="margin-top: 10px;">
                        <label for="beneficial_type"> ভাতা নির্বাচন করুন</label>
                        <select id="beneficial_type" name="beneficial_type" class="form-control">
                        	<option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                                        <option value="1">বয়স্ক ভাতা</option>
                                        <option value="2">বিধবা ভাতা</option>
                                        <option value="3">হতদরিদ্র ভাতা</option>
                                        <option value="4">ভাতা</option>
                                        <option value="5">মুক্তি যোদ্ধা ভাতা

                                        </option>

                                        <option value="6">অন্যান্য ভাতা

                                        </option>
                                        <option value="7">১০টাকা কেজি চাউল</option>

                                        <option value="8">৩০টাকা কেজি চাউল</option> 
                        </select>
                      </div>
                      <button type="submit" class="btn btn-success">Submit</button>
                      </form>
                </div>
            </div>
        </div>
</div>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



@endsection
