@extends('admin_master')
@section('admin_content')
 
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 70px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>গুরুত্বপূর্ণ লিঙ্কসমূহ/আবেদনপত্র</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">হোম</a></li>
            <li class="breadcrumb-item active">গুরুত্বপূর্ণ লিঙ্কসমূহ/আবেদনপত্র</li>
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
                <b style="font-size: 15px;">গুরুত্বপূর্ণ লিঙ্কসমূহ/আবেদনপত্র</b>
                <a style="float: right;" href="{{URL::to('/add-link')}}" class="btn btn-primary">Add New</a>
                <div class="container col-lg-4">

      
                   </div>                
               
               
               
                

              
               
              </div>
              <table   class="table table-striped table-bordered datatable responsive nowrap table-hover"
                            style="width:100%">
                <thead>
                  <tr>
                    <th>নং/সিরিয়াল</th> 
                    <th>Title</th> 
                  
                    <th>কর্ম</th>
                                     
                  </tr>
                </thead>
                <tbody>
                 @foreach($all as $key=>$row) 
                  <tr>
                  	<td>{{$key+1}}</td>
                  	<td>{{$row->title}}</td>
                  	

                  	<td>
                  	  <a href="{{URL::to('/edit-important-link/'.$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                  	  <a href="{{URL::to('/delete-important-link/'.$row->id)}}" class="btn btn-danger btn-sm" id="delete" class="btn btn-delete btn-sm">Delete</a> 
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