@extends('admin_master')
@section('admin_content')


 <div class="content-wrapper"> 

    <section class="content">
        <div class="container-fluid">
          <div class="row mb-2" style="margin-top: 20px;">
            <div class="col-sm-6">
                <h5>বসতবাড়ী পরিবারের শ্রেণীবিন্যাস</h5>
            </div> 
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">হোম</a></li>
                    <li class="breadcrumb-item active"> বসতবাড়ী পরিবারের শ্রেণীবিন্যাস</li>
                </ol>
            </div>   
        </div>
       </div>
     </section>
     <div class="row"> 
     	 <div class="col-md-12">
     	 	 <div class="card card-warning">
     	 	 	 <div class="card">
     	 	 	 	<div class="card-header">
                        <h3 class="card-title"> বসতবাড়ী পরিবারের শ্রেণীবিন্যাস</h3>
                    </div>
                     @php
                         $wards = DB::table('wards')->orderBy('id','DESC')->get();
                         $latest_ward = DB::table('wards')->orderBy('id','DESC')->first();
                         $villages = DB::table('villages')
                              ->where('ward_id', $latest_ward->id)
                              ->orderBy('villages.id', 'DESC')
                              ->get();
                        @endphp
                     <div class="card-body">
                       <div class="mb-3">

                       	 <form action="{{ URL::to('/filter-family_class')}}" method="get">
                                  @csrf
                                <div class="row">
                                    <div class="col-lg-5 col-md-7 col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select style="width: 75px;" id="ward_id"
                                                    style="border-radius: .25rem 0 0 .25rem;" name="ward_id"
                                                    class="form-control form-control-sm">
                                                    <option value="" disabled selected>ওয়ার্ড
                                                    </option>
                                                    @foreach ($wards as $ward)
                                                        <option value="{{$ward->id}}">{{ $ward->ward_no }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group-prepend">
                                                <select style="width: 120px;" style="border-radius: 0;"
                                                    name="village_id" id="village_id"
                                                    class="form-control form-control-sm">
                                                    <option value="" selected="" disabled="">গ্রাম
                                                    </option>
                                                    
                                                </select>
                                            </div>

                                            <div class="input-group-prepend">
                                            	<label for="family_class"></label>
                                            	<select style="width: 190px;" style="border-radius: 0;"
                                                    name="family_class" id="family_class"
                                                    class="form-control form-control-sm">
                                                    <option value="" selected="" disabled="">পারিবারিক শ্রেণী
                                                    </option>

                                                   <option value="1">উচ্চ ভিত্ত</option>
                                   <option value="2">মধ্যবিত্ত</option>
                                   <option value="3">দরিদ্র </option>
                                   <option value="4">হতদরিদ্র</option>
                                                    
                                                </select>
                                            </div>


                                          

                                            <div class="input-group-append">
                                                <button class="btn btn-success btn-sm"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              </form>
                       </div>

                       <table  class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                            style="width:100%">

                           <thead>
                           	<tr>
                               <th>সিরিয়াল/নং</th>
                               <th>নাম</th>
                               <th>মোবাইল</th>
                               <th>এনআইডি/জন্মনিবন্ধন</th>
                               <th>পারিবারিক শ্রেণী</th> 
                           	</tr>
                           </thead>
                           <tbody>
                           	@foreach($all as $key=>$row)

                           	 <tr>
                           	   <td>{{$key+1}}</td>
                           	   <td>{{$row->name}}</td>
                           	   <td>{{$row->mobile}}</td>
                           	   @if($row->nid == NULL)
                           	    <td>{{$row->birth_certificate}}</td>
                           	   @else
                           	    <td>{{$row->nid}}</td>
                           	   @endif
                           	   @if($row->family_class == '1')
                           	   <td>উচ্চ ভিত্ত</td>
                           	   @elseif($row->family_class == '2')
                           	   <td>মধ্যবিত্ত</td>
                           	   @elseif($row->family_class == '3')
                           	    <td>দরিদ্র</td>
                           	   @elseif($row->family_class == '4')
                           	    <td>হতদরিদ্র</td>
                           	   @endif
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
 $(document).ready(function(){
 	$(document).on('change', '#ward_id', function(){
      var ward_id = $('#ward_id').val();
      $.ajax({
         url: "{{  url('/get-village_ward') }}",

         type:"GET",
         data:{'ward_id':ward_id},
         dataType:"html",
         success:function(data) {
             
              $("#village_id").html(data);
          
            
            
            
         },
        
       });
   });
 });
</script>
@endsection 