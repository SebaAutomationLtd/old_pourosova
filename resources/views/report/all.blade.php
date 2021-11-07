@extends('admin_master')
@section('admin_content')


<div class="content-wrapper">

    <section class="content  card card-primary">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px">
                <div class="col-sm-6">
                    <h4> অপশন নির্বাচন করুন</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active"> অপশন নির্বাচন করুন</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="website-form form-group">
                        <div class="card-header">
                            <h3 class="card-title"> অপশন নির্বাচন করুন</h3>
                        </div>
                      <form action="{{URL::to('/select-option')}}" method="post">
                      	@csrf
                      <div class="form-group" style="margin-top: 10px;">
                        <label for="beneficial_type"> অপশন নির্বাচন করুন</label>
                        <select id="beneficial_type" name="option_type" class="form-control">
                        	<option value="" selected="" disabled="">--নির্বাচন করুন--</option>
                                        <option value="1">বসত বাড়ি কর</option>
                                        <option value="2">ট্রেড লাইসেন্স</option>
                                        <option value="3">নাগরিক সনদ</option>
                                        <option value="4">চারিত্রিক সনদ</option>
                                        <option value="5">এতিম সনদ

                                        </option>

                                        <option value="6">মৃত্যু সনদ

                                        </option>

                                        <option value="7">ওয়ারিশ সনদ

                                        </option>
                                         
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
