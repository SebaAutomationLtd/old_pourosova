@extends('admin_master')
@section('admin_content')

<section class="content">
  
   <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>গুরুত্বপূর্ণ লিঙ্কসমূহ/আবেদনপত্র</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active"> গুরুত্বপূর্ণ লিঙ্কসমূহ/আবেদনপত্র</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card main-chart mt-4">
        	<div class="card-header panel-tabs">
                <h5>গুরুত্বপূর্ণ লিঙ্কসমূহ/আবেদনপত্র</h5>
            </div>
        </div>

         <div class="card-body">
          

             
             <form action="{{URL::to('/update-welcome-description/'.$edit->id)}}" method="post" enctype="multipart/form-data">
           		@csrf
             	

             

           
               <div class="form-group">
                  <label for="description">Description</label>
                  <textarea rows="8" class="form-control description" id="description" name="description">{{$edit->description}}</textarea>
                 </div>
         



            

             
         
           <button type="submit" class="btn btn-success">Save</button>
       
         </form>
      </div>

    </div>
   </div>

</section>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


 <script>
  CKEDITOR.replace( 'description', {
   height:['300'],
   
});



 </script>

@endsection