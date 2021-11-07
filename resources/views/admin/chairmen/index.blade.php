@extends('admin_master')
@section('admin_content')

<section class="content">
  <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
      <div class="col-sm-6">
          <h5>চেয়ারম্যান তালিকা</h5>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active"> চেয়ারম্যান তালিকা নিবন্ধন পরিচালনা করুন</li>
          </ol>
      </div>
  </div>
 <div class="row">
 <div class="col-md-12">
      <div class="card main-chart mt-4">
          <div class="card-header panel-tabs">
              <h5 style="display: inline-block">চেয়ারম্যান তালিকা নিবন্ধন টেবিল</h5>
              <a href="{{route('create.chaimen')}}" class="btn btn-primary" style="float: right">
                <i class="fas fa-store-alt"></i> নতুন চেয়ারম্যান যুক্ত করুন
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
                                  <th> নং/সিরিয়াল </th>
                                  <th data-priority="2">নাম</th>
                                  <th>মোবাইল</th>
                                  <th>ইমেল</th> 
                                  <th>একশন</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($all as $key=>$row)
                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->chairmen_name}}</td>
                              <td>{{$row->mobile}}</td>
                              <td>{{$row->email}}</td>
                              <td>
                               <a href="{{route('edit.chairmen',$row->id)}}" class="btn btn-primary">Edit</a>
                               <a href="{{route('delete.chairmen',$row->id)}}" class="btn btn-danger" id="delete">Delete</a> 
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