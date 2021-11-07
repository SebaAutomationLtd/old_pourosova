@extends('admin_master')
@section('admin_content')
 
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 70px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>মৃত্যু সনদ আবেদনের তালিকা</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">হোম</a></li>
            <li class="breadcrumb-item active">মৃত্যু সনদ আবেদনের তালিকা</li>
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
                <b style="font-size: 15px;">মৃত্যু সনদ আবেদনের তালিকা</b>
                <div class="container col-lg-4">

      
                   </div>                
               
               
               
                

              
               
              </div>
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>নং/সিরিয়াল</th> 
                    <th>নাম</th> 
  
                    <th>Status</th>
                    <th>কর্ম</th>
                                     
                  </tr>
                </thead>
                <tbody>
                 @foreach($all as $key=>$row) 
                  <tr>
                  	<td>{{$key+1}}</td>
                  	<td>{{$row->name}}</td>
                  
                  	@if($row->status == '1')
                  	 <td>Active</td>
                  	@else
                  	  <td>Pending</td>
                  	@endif

                  	<td>
                  	 @if($row->status == '0')
          <a href="{{URL::to('/approved-dead_sonod/'.$row->id)}}" class="btn btn-success btn-sm">Approved</a>
        @else
        <a  href="{{URL::to('/inactived-dead_sonod/'.$row->id)}}" class="btn btn-danger btn-sm">Pending</a>
          
        @endif

                  	 <a href="{{URL::to('/view-dead_sonod/'.$row->id)}}" class="btn btn-info btn-sm">View</a>
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
