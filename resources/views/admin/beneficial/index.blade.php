@extends('admin_master')
@section('admin_content')
  
<section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>সুবিধাভোগীদের তালিকা</h5> 
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active">সুবিধাভোগীদের তালিকা</li>
            </ol>
        </div>
    </div>
   <div class="row">
   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>সুবিধাভোগীদের তালিকা </h5>
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
                 <form action="{{ URL::to('/search-beneficial')}}" method="get">
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
                                                <select style="width: 70px;" style="border-radius: 0;"
                                                    name="village_id" id="village_id"
                                                    class="form-control form-control-sm">
                                                    <option value="" selected="" disabled="">গ্রাম
                                                    </option>
                                                    
                                                </select>
                                            </div>

                                             <input style="width: 70px;" class="form-control form-control-sm" type="text"
                                                name="mobile" placeholder="মোবাইল ..."
                                                aria-label="Recipient's ">


                                           <input style="width: 60px;" class="form-control form-control-sm" type="text"
                                                name="nid" placeholder="NID">


                                            <input style="width: 50px;" class="form-control form-control-sm" type="text"
                                                name="holding_no" placeholder="হোল্ডিং নং ..."
                                                aria-label="Recipient's ">

                                            <div class="input-group-append">
                                                <button class="btn btn-success btn-sm"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              </form>
              </div>
                
                <div class=""> 
                    <div class="table-data">
                        <table
                            class="table table-striped table-bordered datatable responsive nowrap table-hover"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th> ক্রমিক </th>
                                    <th>নাম</th>
                                   
                                    <th>এনআইডি/জন্ম নিবন্ধন নম্বর</th>

                                    <th>ভাতার নাম</th>
                                    <th>মোবাইল নং</th>
                                    <th>ওয়ার্ড </th> 
                                   
                                    <th>একশন</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($all as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    
                                    <td>
                                     {{$row->name}}
                                    </td>
                                    @if($row->nid == NULL)
                                   <td>{{$row->birth_certificate}}</td>
                                   @else
                                   <td>{{$row->nid}}</td>
                                   @endif
                                   @if($row->beneficial_type == 1)
                                   <td>বয়স্ক ভাতা</td>
                                   @elseif($row->beneficial_type == 2)
                                    <td>বিধবা ভাতা</td>
                                   @elseif($row->beneficial_type == 3)
                                    <td>হতদরিদ্র ভাতা</td>
                                   @endif
                                   <td>{{$row->mobile}}</td>

                                   <td>{{$row->ward_no}}</td>
                                   <td>
 									
 									<a href="{{URL::to('/edit-beneficial/'.$row->id)}}" class="btn btn-primary btn-sm">Edit</a>

 									<a href="{{URL::to('/delete-beneficial/'.$row->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>

                                   </td>
                                    
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
</div>
</section>


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