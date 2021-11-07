@extends('admin_master')
@section('admin_content')

<section class="content">
  
   <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>কাউন্সিলর</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active"> কাউন্সিলর</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card main-chart mt-4">
        	<div class="card-header panel-tabs">
                <h5>কাউন্সিলর</h5>
            </div>
        </div>

         <div class="card-body">
           <div class="row">

             <div class="col-md-6">
             <form action="{{URL::to('/insert-councilor')}}" method="post" enctype="multipart/form-data">
           		@csrf
             	<div class="form-group">
		           	<label for="name">কাউন্সিলরের নাম</label>
		           	<input type="text" id="name" name="name" class="form-control"  placeholder="কাউন্সিলরের নাম" required="">
		        </div> 
             </div>

             <div class="col-md-6">
             	<div class="form-group">
              	<label for="ward_no">ওয়ার্ড নং</label>
              	<input type="text" name="ward_no" id="ward_no" class="form-control" placeholder="ওয়ার্ড নং" required="">
              </div>
             </div>
              

             <div class="col-md-6">
             	<div class="form-group">
             	  <label for="image">ছবি</label><br>
             	  <input type="file" accept="image/*" onchange="readURL(this);" name="image" id="image" class="form-group" required="">
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


<script>
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