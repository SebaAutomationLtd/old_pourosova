@extends('admin_master')
@section('admin_content')

<section class="content">
  
   <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>স্লাইডার</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active"> স্লাইডার</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card main-chart mt-4">
        	<div class="card-header panel-tabs">
                <h5>স্লাইডার</h5>
            </div>
        </div>

         <div class="card-body">
           <div class="row">

             <div class="col-md-9">
             <form action="{{URL::to('/insert-website_slider')}}" method="post" enctype="multipart/form-data">
           		@csrf
             	<div class="form-group">
		           	<label for="slider_title">স্লাইডার টাইটেল ( ঐচ্ছিক )</label>
		           	<input type="text" id="slider_title" name="slider_title" class="form-control"  placeholder="স্লাইডার টাইটেল">
		        </div> 
             </div>

            

             <div class="col-md-6">
             	<div class="form-group">
             	  <label for="slider_image">ছবি</label><br>
             	  <input type="file" accept="image/*" onchange="readURL(this);" name="slider_image" id="slider_image" class="form-group" required="">
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