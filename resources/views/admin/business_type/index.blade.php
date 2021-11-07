@extends('admin_master')
@section('admin_content')
<section class="content">
  <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
      <div class="col-sm-6">
          <h5>ব্যবসার ধরণ তালিকা</h5>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">ব্যবসার ধরণ তালিকা পরিচালনা করুন</li>
          </ol>
      </div>
  </div>
 <div class="row">
 <div class="col-md-12">
      <div class="card main-chart mt-4">
          <div class="card-header panel-tabs">
              <h5 style="display: inline-block">ব্যবসার ধরণ তালিকা টেবিল</h5>
              <a href="{{route('create.business_type')}}" class="btn btn-primary" style="float: right">
                নতুন ব্যবসার ধরণ যুক্ত করুন
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
                              <th>সিরিয়াল / নং</th>             
                              <th>ব্যবসার ধরণ </th>
                              <th>শুরু মূলধন রেঞ্জ </th>
                              <th>লাস্ট মূলধন রেঞ্জ </th>               
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($all as $key=>$row)
                                                       
                            <tr>
                              <td>{{$key+1}}</td>                    
                              <td>{{$row->name}}</td> 
                              <td>{{$row->start_capital_range}}</td>
                              <td>{{$row->last_capital_range}}</td>
                              <td>
                                @if($row->status == 1)
                                  <a href="{{route('inactive.business_type',$row->id)}}" class="btn btn-success btn-sm" style="float: left;margin-right: 3px;" >
                                      <i class="fas fa-arrow-down"></i>বন্ধ করুন  
                                    </a>
                                  @else
                                   <a href="{{route('active.business_type',$row->id)}}" class="btn btn-warning btn-sm" style="float: left;margin-right: 3px;" >
                                      <i class="fas fa-arrow-up"></i>চালু করুন 
                                    </a>
                                  @endif
                                  <a href="{{route('edit.business_type',$row->id)}}" class="btn btn-info btn-sm btn-sm" style="float: left;margin-right: 3px;" >
                                  <i class="fas fa-pencil-alt"></i> সম্পাদনা করুন
                                </a>
                              
                              <a href="{{route('delete.business_type',$row->id)}}" id="delete" class="btn btn-danger btn-sm btn-sm">মুছে ফেলা</a>
                              
                                                 
                               
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