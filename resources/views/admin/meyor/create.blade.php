@extends('admin_master')
@section('admin_content')

<section class="content">
  
   <div class="container-fluid">
    <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>মেয়র</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active"> মেয়র</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card main-chart mt-4">
        	<div class="card-header panel-tabs">
                <h5>মেয়র</h5>
            </div>
        </div>

         <div class="card-body">
           <div class="row">

             <div class="col-md-5">
             <form action="{{URL::to('/update-meyor/'.$edit->id)}}" method="post" enctype="multipart/form-data">
           		@csrf
             	<div class="form-group">
		           	<label for="name">মেয়রের নাম</label>
		           	<input type="text" id="name" name="name" class="form-control" value="{{$edit->name}}" placeholder="মেয়রের নাম">
		        </div> 
             </div>

             <div class="col-md-7">
             	<div class="form-group">
		           	<label for="meyor_place">পৌরসভা</label>
		           	<input type="text" id="meyor_place" name="meyor_place" class="form-control" value="{{$edit->meyor_place}}" placeholder="পৌরসভা">
		        </div> 
             </div>

             <div class="col-md-6">
             	<div class="form-group">
             	  <label for="meyor_image">মেয়রের ছবি</label><br>
             	  <input type="file" accept="image/*" onchange="readURL(this);" name="image" id="meyor_image" class="form-group">
             	</div>
             </div>

             <div class="col-md-6">
               <img id="img" style="width: 100px; height: 100px;" src="{{URL::to($edit->image)}}">
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