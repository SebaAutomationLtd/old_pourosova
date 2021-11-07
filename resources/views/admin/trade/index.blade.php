@extends('admin_master')
@section('admin_content')
<section class="content">
  <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
      <div class="col-sm-6">
          <h5>ট্রেড লাইসেন্স ফি</h5>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">ট্রেড লাইসেন্স ফি তালিকা পরিচালনা করুন</li>
          </ol>
      </div>
  </div>
 <div class="row">
 <div class="col-md-12">
      <div class="card main-chart mt-4">
          <div class="card-header panel-tabs">
              <h4 style="display: inline-block">ট্রেড লাইসেন্স ফি তালিকা টেবিল</h4>
              <a href="{{route('create.trade')}}" class="btn btn-primary" style="float: right">
                <i class="fas fa-store-alt"></i> নতুন ট্রেড লাইসেন্স ফি যুক্ত করুন
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
                              <th>ফি </th>
                              <th>ভ্যাট </th>               
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($all as $key=>$row)
                                                       
                            <tr>
                              <td>{{$key+1}}</td>                    
                              <td>{{$row->name}}</td> 
                              <td>{{$row->fee}}</td>
                              <td>{{$row->vat}}</td>
                              <td>
                                
                                  <a href="{{route('edit.trade',$row->id)}}" class="btn btn-info btn-sm btn-sm" style="float: left;margin-right: 3px;" >
                                  <i class="fas fa-pencil-alt"></i> সম্পাদনা করুন
                                </a>
                              
                              <a href="{{route('delete.trade',$row->id)}}" id="delete" class="btn btn-danger btn-sm btn-sm">মুছে ফেলা</a>
                              
                                                 
                               
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