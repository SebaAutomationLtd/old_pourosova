@extends('admin_master')
@section('admin_content')
 
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 70px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>ট্রেড লাইসেন্স আবেদনের তালিকা</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">হোম</a></li>
            <li class="breadcrumb-item active">ট্রেড লাইসেন্স আবেদনের তালিকা</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> 


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- /.col -->
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <b style="font-size: 15px;">ট্রেড লাইসেন্স আবেদনের তালিকা</b>
                <div class="container col-lg-4">

      
                   </div>                
               
               
               
                

              
               
              </div>
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>নং/সিরিয়াল</th> 
                    <th>নাম</th> 
                    <th>মোবাইল নং</th>
                    <th>Status</th>
                    <th>কর্ম</th>
                                     
                  </tr>
                </thead>
                <tbody>
                 @foreach($all as $key=>$row) 
                  <tr>
                  	<td>{{$key+1}}</td>
                  	<td>{{$row->owner_name}}</td>
                  	<td>{{$row->mobile}}</td>
                  	@if($row->payment_status == '1')
                  	 <td>Active</td>
                  	@else
                  	  <td>Pending</td>
                  	@endif

                  	<td>
                  	 @if($row->payment_status == '0')
                  	  <a href="{{route('active.trade_approved',$row->id)}}" class="btn btn-success btn-sm">Active</a>
                  	 @else
                  	  <a href="{{route('inactive.trade_approved',$row->id)}}" class="btn btn-success btn-sm">Inactive</a>
                  	 @endif
                  	</td>
                   </tr>

                 @endforeach            
                </tbody>
              </table>
              <br>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>

@endsection