@extends('member_master')
@section('member_content')


<div class="col-lg-9 mt-4 mt-lg-0">
    <div class="dashboard-body">
        <div class="content-header">
            লাইসেন্স নবায়ন করুন
         
        </div>
        <div class="content py-5">
        	<form action="{{route('renew.license_years')}}" method="post">
        	 @csrf
        	 <input type="hidden" name="user_id" value="{{$user_id}}">
 			<div class="form-group col-md-6">
              <h4>নবায়নের বছর সমূহ</h4><br>

              @for($i=$data->last_license_issue_year; $i<=$year; $i++)

              <input type="checkbox" class="years" name="license_years[]" id="{{$i}}" value="{{$i}}-{{$i+1}}">                        
              <label style="cursor: pointer;" for="{{$i}}"><span class="cont">{{$i}}-{{$i+1}}</span></label><br>
             @endfor             
           </div>

           <button type="submit" class="btn btn-primary next">Next >></button>
      	  </form>
        </div>
     </div>
 </div>



@endsection