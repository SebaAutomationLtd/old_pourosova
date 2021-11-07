@extends('admin_master')
@section('admin_content')
 
<section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>পেন্ডিং ইউজার তালিকা</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active"> পেন্ডিং ইউজার তালিকা </li>
            </ol>
        </div>
    </div>
   <div class="row">
   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5 style="display: inline-block">পেন্ডিং ইউজার তালিকা</h5>
                <a href="{{route('general_member')}}" class="btn btn-primary" style="float: right">
                  <i class="fas fa-store-alt"></i> সকল ইউজার
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
                                    <th>সিরিয়াল নং</th>
                                    <th>নাম</th>
                                    <th>User ID</th>
                                    <th>Password</th>
                                    <th>বাবা/স্বামীর নাম</th>
                                    <th>মোবাইল</th>
                                    
                                    <th>ওয়ার্ড নাম্বার </th>
                                    <th>Status</th>
                                    <th>কর্ম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$row)
                                <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$row->name}}</td>
                                 <td>{{$row->user_id}}</td>
                                 <td>{{$row->show_password}}</td>
                                 @if($row->father_name == NULL)
                                 <td>{{$row->husband_name}}</td>
                                 @else
                                  <td>{{$row->father_name}}</td>
                                 @endif
                                 <td>{{$row->mobile}}</td>
                                 <td>{{$row->ward_id}}</td>
                                 
                                 @if($row->status == '0')
                                  <td>Inactive</td>
                                
                                 @endif

                                 <td>
                                  @if($row->status == '0') 
                                   <a href="{{route('active.general_member',$row->id)}}" class="btn btn-info btn-sm" title="Active"><i class="fa fa-thumbs-up"></i></a>
                                 @endif

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