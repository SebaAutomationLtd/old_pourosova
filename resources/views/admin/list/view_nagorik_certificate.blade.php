@extends('admin_master')
@section('admin_content')
 

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 40px;"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>নাগরিক সনদ আবেদনকারী</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">হোম</a></li>
             <li class="breadcrumb-item active">নাগরিক সনদ আবেদনকারী</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> 

    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    		<ul class="list-group">
			  <li class="list-group-item"><b>নাম:</b> {{$view->name}}</li>
			   @if($view->father_name == NULL)
			  <li class="list-group-item"><b>স্বামীর নাম: </b>{{$view->husband_name}}</li>
			  @else
			   <li class="list-group-item"><b>পিতার নাম: </b>{{$view->father_name}}</li>
			  @endif
			  <li class="list-group-item"><b>মাতার নাম: </b>{{$view->mother_name}}</li>
			   <li class="list-group-item"><b>মোবাইল: </b>{{$view->mobile}}</li>
			   @if($view->nid == NULL)
			 <li class="list-group-item"><b>জন্ম নিবন্ধন নম্বর: </b>{{$view->birth_certificate}}</li>
			 @else
			  <li class="list-group-item"><b>এনআইডি নম্বর: </b>{{$view->nid}}</li>
			 @endif

			 <li class="list-group-item"><b>জন্ম তারিখ: </b>{{$view->day}}/{{$view->month}}/{{$view->year}}</li>

			 <li class="list-group-item"><b>ঠিকানা: </b>{{$view->address}}</li>
			 @if($view->status == '1')
			 <li class="list-group-item"><b>Status: </b>Active</li>
			 @else
			  <li class="list-group-item"><b>Status: </b>Pending</li>
			 @endif
			 @if($view->image == NULL)
			 @else
			 <li class="list-group-item"><b>ছবি: </b><img style="width: 60px; height: 60px;" src="{{URL::to($view->image)}}"></li>
			 @endif
			</ul>
            


			</div>
    	  @if($view->status == '0')
    	  	<a style="margin-top: 10px; margin-left: 18px;" href="{{URL::to('/approved-character_certificate/'.$view->id)}}" class="btn btn-success">Approved</a>
    	  @else
    	  <a style="margin-top: 10px; margin-left: 18px;" href="{{URL::to('/inactived-character_certificate/'.$view->id)}}" class="btn btn-danger">Pending</a>
    	   	
    	  @endif
        
    	  
    	 </div>


     </div>
 </div>


@endsection