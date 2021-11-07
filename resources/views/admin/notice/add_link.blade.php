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
           <div class="row">

             <div class="col-md-5">
             <form action="{{URL::to('/insert-link')}}" method="post" enctype="multipart/form-data">
           		@csrf
             	<div class="form-group">
		           	<label for="title">Title</label>
		           	<input type="text" id="title" name="title" class="form-control" placeholder="Title" required="">
		        </div> 
             </div>

             <div class="col-md-7">
             	<div class="form-group">
		           	<label for="url">URL</label>
		           	<input type="text" id="url" name="url" class="form-control" placeholder="URL">
		        </div> 
             </div>

             <div class="col-md-12">
                <div class="form-group">
                 <h5>Select Sidebar</h5>
                 <input type="checkbox" id="left_sidebar" name="left_sidebar" value="1">
                 <label for="left_sidebar" style="cursor: pointer;">Left Sidebar</label><br>

                 <input type="checkbox" id="right_sidebar" name="right_sidebar" value="1">
                 <label for="right_sidebar" style="cursor: pointer;">Right Sidebar</label>
                </div>
               
             </div>

             <div class="col-md-12">
               <div class="form-group">
                  <label for="description">Description</label>
                  <textarea rows="8" class="form-control description" id="description" name="description"></textarea>
                 </div>
             </div>



             <div class="col-md-6">
                <div class="form-group">
                  <label for="image">ছবি</label><br>
                  <input type="file" accept="image/*" onchange="readURL(this);" name="image" id="image" class="form-group">
                </div>
             </div>

             <div class="col-md-6">
               <img style="display: none" id="img" style="width: 100px; height: 100px;" src="">
             </div>

             
           </div>
           <button type="submit" class="btn btn-success">Save</button>
         </div>
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


  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#img").css('display', 'block');
                $('#img')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
 </script>

@endsection