@extends('admin_master')
@section('admin_content')
<section class="content">
  <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
      <div class="col-sm-6">
          <h5>গ্রামের তালিকা</h5>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">গ্রামের তালিকা পরিচালনা করুন</li>
          </ol>
      </div>
  </div>
 <div class="row">
 <div class="col-md-12">
      <div class="card main-chart mt-4">
          <div class="card-header panel-tabs">
              <h5 style="display: inline-block">গ্রামের তালিকা টেবিল</h5>
              <a href="{{route('create.village')}}" class="btn btn-primary" style="float: right">
                নতুন গ্রাম যুক্ত করুন
              </a>
          </div>
          <div class="card-body">
              <div class=""> 
                  <div class="table-data">
                      <table
                          class="table table-striped table-bordered datatable responsive nowrap table-hover"
                          style="width:100%">
                          <thead>
                            <tr>
                              <th>নং/সিরিয়াল</th>
                              <th>গ্রাম</th>
                              <th>ওয়ার্ড</th>
                              <th>কর্ম</th>
                                               
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($all as $key=>$row)
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->village_name}}</td>
                                <td>{{$row->ward_no}}</td>
                                
                                <td>
                                  <a href="{{route('edit.village',$row->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i>সম্পাদনা করুন</a>
                                  <a href="{{route('delete.village',$row->id)}}" class="btn btn-danger" id="delete">সরিয়ে দিন</a> 
                                </td>
                              </tr>   
                            @endforeach 
                          </tbody>
                      </table>
                  </div>
              </div> 
          </div>
      </div>
  </div>
</div>
</div>
</section>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 


@endsection