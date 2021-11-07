@extends('admin_master')
@section('admin_content')

<section class="content">
  <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
      <div class="col-sm-6">
          <h5>পেশা তালিকা</h5>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active"> পেশা তালিকা নিবন্ধন পরিচালনা করুন</li>
          </ol>
      </div>
  </div>
 <div class="row">
 <div class="col-md-12">
      <div class="card main-chart mt-4">
          <div class="card-header panel-tabs">
              <h5 style="display: inline-block">পেশা তালিকা নিবন্ধন টেবিল</h5>
              <a href="{{route('create.occupation')}}" class="btn btn-primary" style="float: right">
                <i class="fas fa-store-alt"></i> নতুন পেশা যুক্ত করুন
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
                              <th>পেশার নাম</th>
                             
                              <th>স্টেটাস</th>
                              <th>অ্যাকশন</th>                 
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($all as $key=>$row)
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$row->name}}</td>
                              @if($row->status == 1)
                               <td>Active</td>
                              @else
                               <td>Inactive</td>
                              @endif
                               <td>
                               @if($row->status == 1)
                                 <a href="{{route('inactive.occupation',$row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-down"></i></a>
                               @else
                                  <a href="{{route('active.occupation',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i></a>
                               @endif
         
                                
                   	  <a href="{{route('edit.occupation',$row->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                   	  <a href="{{route('delete.occupation',$row->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>  
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