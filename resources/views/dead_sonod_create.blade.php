@extends('member_master')
@section('member_content')

 <div class="col-lg-9 mt-4 mt-lg-0">
   <div class="dashboard-body">
      <div class="content-header" style="padding: 15px;">
	       মৃত্যু সনদ
	    </div>
	</div>
	<div class="content py-5">
	    <form action="{{URL::to('/insert-death_sonod')}}" method="post">
	       @csrf
         <div class="row">
            <div class="col-md-6">
           	 	<div class="form-group">
           	 	<label for="name">মৃত ব্যক্তির নাম</label>
           	 	<input type="text" id="name" name="name" class="form-control" placeholder="মৃত ব্যক্তির নাম" required="">
           	 </div>
           	 </div>

           	 <div class="col-md-6">
           	 	<div class="form-group">
           	 	
           	 	<select for="guardian_status" class="guardian_status">
           	 		
           	 		<option value="husband">স্বামীর নাম</option>
           	 		<option value="wife">স্ত্রীর নাম</option>
           	 	</select>
           	 	<input style="margin-top: 10px;" type="text" id="guardian_status" name="husband_name" class="form-control guardian_val" placeholder="স্বামী/স্ত্রীর নাম">
           	 </div>
           	 </div>
           	 
           	 <div class="col-md-6">
           	   <div class="form-group">
           	      <label for="father_name">পিতার নাম</label> 
           	      <input type="text" name="father_name" class="form-control" placeholder="পিতার নাম" required="">
           	   </div>   
           	 </div>
           	 
           	 <div class="col-md-6">
           	   <div class="form-group">
           	      <label for="mother_name">মাতার নাম</label> 
           	      <input type="text" name="mother_name" class="form-control" placeholder="মাতার নাম" required="">
           	   </div>   
           	 </div>

           	 <div class="col-md-6">
                <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ</label> <span
                    style="color: red">*</span>
                <div class="d-flex">
                    <select name="birth_day" id="birth_day" class="form-control col-md-4" required="">
                        <option value="">Day</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="birth_month" id="birth_month" class="form-control col-md-4" required="">
                        <option value="">Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <select name="birth_year" id="birth_year" class="form-control col-md-4" required="">
                        <option value="">Year</option>
                        @for ($i = (int) date('Y'); $i >= 1700; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

           	 
           	 <div class="col-md-6" style="margin-top: 12px;">
           	 	<div class="form-group">
           	 	
           	 	<select for="birth_nid" class="birth_nid" required="">
           	 		<option value="select_nid">এনআইডি নম্বর</option>
           	 		<option value="select_birth">জন্ম নিবন্ধন নম্বর</option>
           	 	</select>
           	 	<input style="margin-top: 10px;" type="text" id="birth_nid" name="nid" class="form-control val_birth_nid" placeholder="এনআইডি / জন্ম নিবন্ধন নম্বর">
           	 </div>
           	 </div>
           	 
           	 
           	 
           	 <div class="col-md-6">
                <label for="Birthdatepicker" class="col-form-label">মৃত্যুর তারিখ</label> <span
                    style="color: red">*</span>
                <div class="d-flex">
                    <select name="death_day" id="death_day" class="form-control col-md-4" required="">
                        <option value="">Day</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="death_month" id="death_month" class="form-control col-md-4" required="">
                        <option value="">Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <select name="death_year" id="death_year" class="form-control col-md-4" required="">
                        <option value="">Year</option>
                        @for ($i = (int) date('Y'); $i >= 1700; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            
            <div class="col-md-6" >
              <div class="form-group" style="margin-top: 12px;">
                 <label for="death_reason">মৃত্যুর কারণ</label>
                 <input type="text" name="death_reason" class="form-control" placeholder="মৃত্যুর কারণ"   required  >
              </div>
              
              
            </div>
            
            
           	 

             <div class="col-md-12" style="margin-top: 15px;">
              <div class="form-group">
              	 <label for="address"><b>ঠিকানা</b></label>
              	  
              	  <input type="text" name="address" id="address" class="form-control" placeholder="ঠিকানা" required>
               </div>
               
         </div>
	</div>
	  <button type="submit" class="btn btn-success">Submit</button>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('change', '.guardian_status', function(){
 		var guardian_status = $('.guardian_status').val();

 		
 		if(guardian_status == 'wife'){
 			$('.guardian_val').attr('placeholder', 'স্ত্রীর নাম');
 			 $('.guardian_val').attr('name', 'wife_name');
 		}
 		else{
 			$('.guardian_val').attr('placeholder', 'স্বামীর নাম');
 			$('.guardian_val').attr('name', 'husband_name');
 		}
 		
 	});
 	
 	
 	$(document).on('change', '.birth_nid', function(){
 		var birth_nid = $('.birth_nid').val();

 		
 		if(birth_nid == 'select_birth'){
 			$('.val_birth_nid').attr('placeholder', 'জন্ম নিবন্ধন নম্বর');
 			 $('.val_birth_nid').attr('name', 'birth_certificate');
 		}
 		else{
 			$('.val_birth_nid').attr('placeholder', 'এনআইডি নম্বর');
 			 $('.val_birth_nid').attr('name', 'nid');
 		}
 		
 	});
 	
 	
    });
</script>
@endsection