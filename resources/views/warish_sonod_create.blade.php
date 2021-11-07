@extends('member_master')
@section('member_content')
 
 <div class="col-lg-9 mt-4 mt-lg-0">
   <div class="dashboard-body">
      <div class="content-header" style="padding: 15px;">
	       ওয়ারিশ সনদ
	    </div>

	    <div class="content py-5">
	     <form action="{{URL::to('/insert-warish_application')}}" enctype="multipart/form-data" method="post">
	     	@csrf
           <div class="row">
           	 <div class="col-md-4">
           	 	<div class="form-group">
           	 	<label for="name">মৃত ব্যক্তির নাম</label>
           	 	<input type="text" id="name" name="name" class="form-control" placeholder="মৃত ব্যক্তির নাম" required="">
           	 </div>
           	 </div>

           	 <div class="col-md-4">
           	 	<div class="form-group">
           	 	
           	 	<select for="guardian_status" class="guardian_status" required="">
           	 		<option value="father">পিতার নাম</option>
           	 		<option value="husband">স্বামীর নাম</option>
           	 	</select>
           	 	<input style="margin-top: 10px;" type="text" id="guardian_status" name="father_name" class="form-control guardian_val" placeholder="পিতা / স্বামীর নাম">
           	 </div>
           	 </div>

           	 <div class="col-md-4">
           	 	<div class="form-group">
           	 	<label for="mother_name">মাতার নাম</label>
           	 	<input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="মাতার নাম" required="">
           	 </div>
           	 </div>

           	 <div class="col-md-6">
           	 	<div class="form-group">
           	 	<label for="mobile">মোবাইল</label>
           	 	<input type="text" id="mobile" name="mobile" class="form-control" placeholder="মোবাইল" required="">
           	 </div>
           	 </div>
           	 <div class="col-md-6">
           	 	<div class="form-group">
           	 	
           	 	<select for="birth_nid" class="birth_nid" required="">
           	 		<option value="select_nid">এনআইডি নম্বর</option>
           	 		<option value="select_birth">জন্ম নিবন্ধন নম্বর</option>
           	 	</select>
           	 	<input style="margin-top: 10px;" type="text" id="birth_nid" name="nid" class="form-control val_birth_nid" placeholder="এনআইডি / জন্ম নিবন্ধন নম্বর">
           	 </div>
           	 </div>

           	 

             <div class="col-md-12" style="margin-top: 5px;">
              <div class="form-group">
              	 <label for="address"><b>ঠিকানা</b></label>
              	  
              	  <input type="text" name="address" id="address" class="form-control" placeholder="ঠিকানা" required>
               </div>
              
             </div>


             <input type="hidden" name="check" class="check" value="0">


           	 
            </div>
          <table class="table" style="background: green">
            <thead>
              <tr>
                <th style="color: white;">উত্তরাধীকারীগনের নাম</th> 
                <th style="color: white;">সম্পর্ক</th>
                 <th style="color: white;">NID</th>
                 <th style="color: white;">মন্তব্য</th>
                 <th><button type="button" style="padding: 3px; color: white;" class="btn btn-warning btn-sm add_more"><i class="fa fa-plus"></i></button></th>
              </tr>
                
            </thead>
            
            <tbody>
                  
            </tbody>
           
          </table>
          
          <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	     </form>
	    </div>
    </div>

 </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
 	$(document).on('change', '.guardian_status', function(){
 		var guardian_status = $('.guardian_status').val();

 		
 		if(guardian_status == 'father'){
 			$('.guardian_val').attr('placeholder', 'পিতার নাম');
 			 $('.guardian_val').attr('name', 'father_name');
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
 	
   $(document).on('click', '.add_more', function(e){
       e.preventDefault();
       Tbody();
   });
   
   $(document).on("click", ".remove", function(e){
       e.preventDefault();
       
      
         $(this).parent().parent().remove();
        
      
    });
    
    $(document).on('input', '.warsh_check', function(){
        $('.check').val('1')
    });
 });
 
 
 function Tbody()
   {
      var tr = 

         '<tr>'+
         '<td><input  type="text" name="warish_member_name[]" class="form-control warsh_check"></td>'+ 
         
         '<td><select name="relation[]" class="form-control"><option value="" selected="" disabled>সম্পর্ক</option><?php $rel = DB::table('relations')->get(); ?>@foreach($rel as $row)<option value="{{$row->relation_name}}">{{$row->relation_name}}</option>@endforeach</select></td>'+
         
          '<td><input type="text" name="member_nid[]" class="form-control"></td>'+
        
        '<td><input  type="text" name="comment[]" class="form-control"></td>'+

        
        

         '<td><a style="cursor: pointer;" class="btn btn-danger btn-sm remove">X</a></td>'+

         
       '</tr>';

       

       $('tbody').append(tr);
   }


 function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
             $("#image").css("display", "block");
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection