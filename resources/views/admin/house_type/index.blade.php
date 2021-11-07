@extends('admin_master')
@section('admin_content')

<section class="content">
  <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
      <div class="col-sm-6">
          <h5>বাড়ির ধরণ</h5>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active"> বাড়ির ধরণ নিবন্ধন পরিচালনা করুন</li>
          </ol>
      </div>
  </div>
 <div class="row">
 <div class="col-md-12">
      <div class="card main-chart mt-4">
          <div class="card-header panel-tabs">
              <h5 style="display: inline-block">বাড়ির ধরণ নিবন্ধন টেবিল</h5>
              <a href="{{route('create.house_type')}}" class="btn btn-primary" style="float: right">
                 নতুন বাড়ির ধরণ যুক্ত করুন
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
                                  <th>স্টেটাস</th> 
                                  <th>একশন</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($all as $key=>$row)
                              <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->name}}</td> 
                              
                              <td>
                                @if($row->status == 1)
                                  <div class='badge badge-success badge-shadow'>Active</div>
                                  @else
                                  <div class='badge badge-danger badge-shadow'>Inactive</div>
                                  @endif 
                              </td>        
                              <td>        
                                <a href="{{route('edit.house_type',$row->id)}}" class="btn btn-info btn-sm" ><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a href="{{route('delete.house_type',$row->id)}}" id="delete" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Delete</a>
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