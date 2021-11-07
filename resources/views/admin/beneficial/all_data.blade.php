@extends('admin_master')
@section('admin_content')
  
<section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            @if($beneficial_type == '1')
                <h5>বয়স্ক ভাতা তালিকা</h5>
                @elseif($beneficial_type == '2')
                <h5>বিধবা ভাতা তালিকা</h5>
                @elseif($beneficial_type == '3')
                 <h5>হতদরিদ্র ভাতা তালিকা</h5>
              
                @elseif($beneficial_type == '5')
                    <h5>মুক্তি যোদ্ধা ভাতা তালিকা</h5>
                 @elseif($beneficial_type == '6')
                  <h5>অন্যান্য ভাতা তালিকা</h5>

                 @elseif($beneficial_type == '7')

                 <h5>১০টাকা কেজি চাউল তালিকা</h5>

                  @elseif($beneficial_type == '8')
                   <h5>৩০টাকা কেজি চাউল তালিকা</h5>
                  @endif
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                
                @if($beneficial_type == '1')
                <li class="breadcrumb-item active">বয়স্ক ভাতা তালিকা</li>
                @elseif($beneficial_type == '2')
                <li class="breadcrumb-item active">বিধবা ভাতা তালিকা</li>
                @elseif($beneficial_type == '3')
                <li class="breadcrumb-item active">হতদরিদ্র ভাতা তালিকা</li>
              
                @elseif($beneficial_type == '5')
                   <li class="breadcrumb-item active">মুক্তি যোদ্ধা ভাতা তালিকা</li>
                 @elseif($beneficial_type == '6')
                  <li class="breadcrumb-item active">অন্যান্য ভাতা তালিকা</li>

                 @elseif($beneficial_type == '7')

                 <li class="breadcrumb-item active">১০টাকা কেজি চাউল তালিকা</li>

                  @elseif($beneficial_type == '8')
                   <li class="breadcrumb-item active">৩০টাকা কেজি চাউল তালিকা</li>
                  @endif
            </ol>
        </div>
    </div>
   <div class="row">
   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
            	@if($beneficial_type == '1')
                <h5>বয়স্ক ভাতা তালিকা</h5>
                @elseif($beneficial_type == '2')
                <h5>বিধবা ভাতা তালিকা</h5>
                @elseif($beneficial_type == '3')
                 <h5>হতদরিদ্র ভাতা তালিকা</h5>
              
                @elseif($beneficial_type == '5')
                    <h5>মুক্তি যোদ্ধা ভাতা তালিকা</h5>
                 @elseif($beneficial_type == '6')
                  <h5>অন্যান্য ভাতা তালিকা</h5>

                 @elseif($beneficial_type == '7')

                 <h5>১০টাকা কেজি চাউল তালিকা</h5>

                  @elseif($beneficial_type == '8')
                   <h5>৩০টাকা কেজি চাউল তালিকা</h5>
                  @endif
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
                 <form action="{{ URL::to('/filter-beneficial_type')}}" method="get">
                                  @csrf
                                <input type="hidden" name="beneficial_type" value="{{$beneficial_type}}">
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