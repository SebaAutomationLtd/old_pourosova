@extends('admin_master')
@section('admin_content')

<div class="content-wrapper">
     
    <section class="content">
        <div class="container-fluid">
          <div class="row mb-2" style="margin-top: 20px">
            <div class="col-sm-6">
                <h4>বানিজ্যিক হোল্ডিং আপডেট</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">হোম</a></li>
                    <li class="breadcrumb-item active">বানিজ্যিক হোল্ডিং আপডেট</li>
                </ol>
            </div>
            
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary website-form">
                                                <div class="card-header p-2">
                                                  <h4 style="display: inline-block">বানিজ্যিক হোল্ডিং আপডেট</h4>
                                                  <a style="float: right;" href="{{route('all_business_hold')}}" class="btn btn-primary">বানিজ্যিক হোল্ডিং তালিকা</a>
</div>
<form role="form" action="{{route('update.business_holding',$edit->id)}}" method="post" enctype="multipart/form-data">
    @csrf                            
    <div class="card-body"> 
        <div class="form-group">
            <h5><u>খানা প্রধানের তথ্য</u></h5>
          <div class="row">

            <div class="col-sm-4">
              <label for="owner_name" class="col-form-label">নাম <span style="color: red">*</span></label>
              <input type="text" name="owner_name" value="{{$edit->owner_name}}" class="form-control" id="owner_name" placeholder="নাম">
              
              @error('owner_name')
                  <small class="text-danger">
                      <strong>{{ $message }}</strong>
                  </small>
              @enderror
            </div>

            <div class="col-sm-4" id="father_name">

                <label for="father_name" class="col-form-label">

                <select id="gurdian_status" name="gurdian_status">
                  <option value="father" <?php if($edit->husband_name == NULL){echo "selected";} ?>>পিতার নাম </option>
                  <option value="husband"<?php if($edit->father_name == NULL){echo "selected";} ?>>স্বামীর নাম</option>
                </select>

                <span style="color: red">*</span></label>

                @if($edit->husband_name == NULL)
                  <input type="text" name="father_name" value="{{$edit->father_name}}" class="form-control gurdian_status" id="father_name" autocomplete="off" placeholder="পিতার নাম ">

                  @error('father_name')
                      <small class="text-danger">
                          <strong>{{ $message }}</strong>
                      </small>
                  @enderror

                @else

                  <input type="text" name="husband_name" value="{{$edit->husband_name}}" class="form-control gurdian_status" id="husband_name" autocomplete="off" placeholder="স্বামীর নাম ">

                  @error('husband_name')
                      <small class="text-danger">
                          <strong>{{ $message }}</strong>
                      </small>
                  @enderror

                @endif

            </div>

            <div class="col-sm-4">
              <label for="mother_name" class="col-form-label">
                মাতার নাম
               </label>
               <span style="color: red">*</span>
               <input type="text" class="form-control" name="mother_name" placeholder="মাতার নাম" value="{{$edit->mother_name}}">

                @error('mother_name')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

            </div>

            <div class="col-sm-6">

              <label for="nid_birth" class="col-form-label">

                  <select id="birth_nid" name="birth_nid">
                      <option value="nid" <?php if($edit->birth_certificate == NULL){echo "selected";} ?>>এনআইডি নম্বর</option>
                      <option value="birth_id_no" <?php if($edit->nid == NULL){echo "selected";} ?>>জন্ম নিবন্ধন নম্বর</option>
                  </select>

                <span style="color: red">*</span></label>
                @if($edit->birth_certificate == NULL)
                  <input type="text" name="nid" value="{{$edit->nid}}" class="form-control birth_nid" id="nid_birth" autocomplete="off" placeholder="এনআইডি নম্বর">

                  @error('nid')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                  @enderror
                
                @else
                  <input type="text" name="birth_certificate" value="{{$edit->birth_certificate}}" class="form-control birth_nid" id="nid_birth" autocomplete="off" placeholder="এনআইডি নম্বর">

                  @error('birth_certificate')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                  @enderror

                @endif

            </div> 

           
            <div class="col-sm-6">
              <label for="mobile" class="col-form-label">মোবাইল<span style="color: red">*</span></label>
              <input type="number" name="mobile" value="{{$edit->mobile}}" class="form-control mobile" id="mobile" placeholder="মোবাইল">

              @error('mobile')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
             

             <div class="col-sm-6">

                <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>

                <select name="ward_id" id="ward_id" class="form-control">

                  <option value="" selected="" disabled="">নির্বাচন করুন</option>
                    @php
                      $wards = DB::table('wards')->orderBy('id', 'DESC')->get();
                    @endphp
                    
                    @foreach($wards as $ward)
                      <option value="{{$ward->id}}" <?php if($edit->ward_id == $ward->id){echo "selected";} ?>>{{$ward->ward_no}}</option>
                    @endforeach

                    @error('ward_id')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                          
                </select>

              </div>

            <div class="col-sm-6">
                <label for="road_moholla" class="col-form-label">রাস্তা/মহল্লা<span style="color: red">*</span></label>

                <input type="text" name="road_moholla" class="form-control" id="road_moholla" placeholder="রাস্তা/মহল্লা" value="{{$edit->road_moholla}}">

                @error('road_moholla')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

            </div>

            <div class="col-sm-6">
              <label for="owner_current_address" class="col-form-label">বর্তমান ঠিকানা<span style="color: red">*</span></label>

              <input type="text" name="owner_current_address" id="owner_current_address" class="form-control owner_current_address" placeholder="বর্তমান ঠিকানা" value="{{$edit->owner_current_address}}">

              @error('owner_current_address')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

            </div>


           <div class="col-sm-6"> 
             <label for="owner_permanent_address" class="col-form-label">স্থায়ী ঠিকানা<span style="color: red">*</span></label>

             <input type="text" name="owner_permanent_address" id="owner_permanent_address" class="form-control" placeholder="স্থায়ী ঠিকানা" value="{{$edit->owner_permanent_address}}">
             <input type="checkbox"  class="same" id="same" value="same">
             <label style="cursor: pointer;" for="same">Same as Current Address</label>
             @error('owner_permanent_address')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
           </div>

          </div>
        </div>

        <div class="form-group"> 
            <h5><u>ব্যবসার বিবরণ</u> </h5>
          <div class="row">

            <div class="col-sm-6">
              <label for="institute_name" class="col-form-label">প্রতিষ্ঠানের নাম<span style="color: red">*</span></label>

              <input type="text" name="institute_name" class="form-control" placeholder="প্রতিষ্ঠানের নাম" id="institute_name" value="{{$edit->institute_name}}">
              @error('institute_name')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>

              <div class="col-sm-6">
          
                      <div class="col-sm-6">
                        <label for="business_type" class="col-form-label">ব্যবসার ধরণ</label>
                        <input type="text" name="business_type" id="business_type" class="form-control" placeholder="ব্যবসার ধরণ" value="{{$edit->business_type}}">

                        @error('business_type')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
              </div>



            <div class="col-sm-12">
              <label for="institute_address" class="col-form-label">ব্যবসা প্রতিষ্ঠানের ঠিকানা<span style="color: red">*</span></label>

              <input type="text" name="institute_address" class="form-control" placeholder="ব্যবসা প্রতিষ্ঠানের ঠিকানা" id="institute_address" value="{{$edit->institute_address}}">

              @error('institute_address')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

            </div>


           

          </div>
        </div>


        <div class="form-group">
            <h5><u>ট্রেড লাইসেন্স</u> </h5>
            <div class="row">
              <div class="col-sm-6">
                <label for="trade_fee" class="col-form-label">ফি<span style="color: red">*</span></label>
                <input type="number" name="trade_fee" value="{{$edit->trade_fee}}" class="form-control fee" id="trade_fee" placeholder="ফি">

                @error('trade_fee')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

              </div>
              <div class="col-sm-6">

                <label for="vat" class="col-form-label">ভ্যাট</label>
                <input type="number" name="vat" value="{{$edit->vat}}" class="form-control vat" id="vat" placeholder="ভ্যাট ১৫%" readonly="">

              </div>

              <div class="col-sm-6">

                <label for="singnboard_tax" class="col-form-label">সাইনবোর্ড কর<span style="color: red">*</span></label>
                <input type="number" name="singnboard_tax"  class="form-control singnboard_tax" id="singnboard_tax" placeholder="সাইনবোর্ড কর" value="{{$edit->singnboard_tax}}">

                @error('singnboard_tax')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

              </div>
              
              <div class="col-sm-6">
                <label for="business_tax" class="col-form-label">ব্যবসা কর<span style="color: red">*</span></label>
                <input type="number" name="business_tax"  class="form-control business_tax" id="business_tax" placeholder="ব্যবসা কর" value="{{$edit->business_tax}}">

                @error('business_tax')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
              </div>

              <div class="col-sm-6">
                <label for="other" class="col-form-label">অন্যান্য<span style="color: red">*</span></label>
                <input type="number" name="other" value="{{$edit->other}}" class="form-control others" id="other" placeholder="অন্যান্য">

                @error('other')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
              </div>

              <div class="col-sm-6">
                <label for="trade_total" class="col-form-label">Total</label>
                <input type="number" name="trade_total" class="form-control total" id="trade_total" placeholder="Total" readonly="" value="{{$edit->trade_total}}">

                @error('trade_total')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
              </div>

              <div class="col-sm-6">
                <label for="last_license_issue_year" class="col-form-label">সর্বশেষ লাইসেন্স ইস্যু বছর</label>
                <select class="form-control" name="last_license_issue_year" id="last_license_issue_year" required>
                  <option value="" selected="" disabled="">নির্বাচন করুন</option>
                  @for($i=$year; $i>=2011; $i--)
                  <option value="{{$i}}" <?php if($edit->last_license_issue_year == $i){echo "selected";} ?>>{{$i}}</option>
                  @endfor
                </select>

                @error('last_license_issue_year')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
              </div>

              </div>
            </div>
  
            <div class="room_information form-group"></div>
            <br>
              <div class="form-group">

                <h5><u>Collect Payment</u> </h5>
                @php
                $service_charge = DB::table('service_charges')->where('id',1)->first(); 
                @endphp
                <div class="row">
                    <div class="col-md-3">
                      <label for="service_charge_id" class="col-form-label">Register Charge <span style="color: red">*</span></label>
                      <input type="text" name="service_charge_id" value="200.00" class="form-control" id="service_charge_id" placeholder="Register charge" autocomplete="off" value="{{$service_charge->commercial_fee}}" readonly="">
                    </div>   
                    <div class="col-sm-4">
                        <label for="payment_type" class="col-form-label">Payment Type <span style="color: red">*</span></label>
                        <select name="payment_type" id="payment_type" class="form-control">
                          <option value="" selected="" disabled="">Select</option>
                          <option value="1" <?php if($edit->payment_type == '1'){echo "selected";} ?>>Cash</option>
                          <option value="4" <?php if($edit->payment_type == '4'){echo "selected";} ?>>Bank</option>
                          <option value="2" <?php if($edit->payment_type == '2'){echo "selected";} ?>>Bkash</option>
                          <option value="3" <?php if($edit->payment_type == '3'){echo "selected";} ?>>Nagad</option>
                        </select>

                        @error('payment_type')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    
                    <div class="col-sm-6" style="margin-top: 10px;">
                      <div class="form-group">
                        <label for="image">Image Upload</label><br>
                        <input type="file" name="image" accept="image/*" onchange="readURL(this);">
                      </div>
                    </div>
                  
                  @if($edit->image == NULL)
                    <div class="col-sm-6" style="margin-top: 10px;">
                      <img id="image" src="" style="width: 60px; height: 60px; display: none;">
                    </div>

                  @else
                  <div class="col-sm-6 img_cont" style="margin-top: 10px;">
                      <img id="image" src="{{URL::to($edit->image)}}" style="width: 60px; height: 60px;">
                        <a style="cursor: pointer; color: blue;" class="remove_image" data-id="{{$edit->id}}"><u>Remove Image<u><a>
                    </div>
                  
                  @endif

                  </div>
              </div>
              
              <button type="submit" class="btn btn-primary save_data">সংরক্ষণ</button>
          </div>
        </div>
 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
  <!-- /.content-wrapper -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script>
  $(document).ready(function(){
      $(document).on('change', "#gurdian_status", function(){
          var gurdian_status = $("#gurdian_status").val();
          if(gurdian_status == 'father'){
              $(".gurdian_status").attr("name", "father_name");
              $(".gurdian_status").attr("placeholder", "পিতার নাম");
          }
          else{
            $(".gurdian_status").attr("name", "husband_name");
            $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
          }
     });
     
     $(document).on('change', "#birth_nid", function(){
          var birth_nid = $("#birth_nid").val();
          if(birth_nid == 'nid'){
              $(".birth_nid").attr("name", "nid");
              $(".birth_nid").attr("placeholder", "এনআইডি");
          }
          else{
            $(".birth_nid").attr("name", "birth_certificate");
            $(".birth_nid").attr("placeholder", "জন্ম নিবন্ধন নম্বর");
          }
     });
     
     $(document).on('change', '.same', function(){
        var owner_current_address = $('.owner_current_address').val();
        var same = $('.same').val();
        var val = $(".same").prop("checked"); 
        if(val == true){
           if(owner_current_address == ""){
             alert("Please Write Current Address");
             $('.same').prop('checked', false); 
             $('#owner_permanent_address').val(''); 
          }
          else{
            $('#owner_permanent_address').val(owner_current_address); 
          }
        }
        else{
          $('#owner_permanent_address').val('');
        } 
        
     });

     

     $(document).on("input", ".fee", function(){
         var fee = $(".fee").val();
         if(fee == ""){
          
             $(".signboard_tax").val('');
             $(".business_tax").val('');
             $(".others").val('');
       
         }
        var vat = fee-fee*85/100;
        $(".vat").val(vat);
        
        $(".total").val(vat);
      });


      $(document).on('input', '.fee', function(){
            var fee = $('.fee').val();
            var parse_fee = parseInt(fee);
            var vat = 15;
            var parse_val = parseInt(vat);

            $('.total').val(parse_fee*vat/100+parse_fee);
        });

        $(document).on('input', '.singnboard_tax', function(){
            var singnboard_tax = $('.singnboard_tax').val();
            var parse_singnboard_tax = parseInt(singnboard_tax);

             var fee = $('.fee').val();
            var parse_fee = parseInt(fee);

            var vat = 15;
            var parse_vat = parseInt(vat);

            $('.total').val(parse_fee+parse_vat+parse_singnboard_tax);
        });

        $(document).on('input','.business_tax', function(){
          var business_tax = $('.business_tax').val();

          var parse_business_tax = parseInt(business_tax);

           var singnboard_tax = $('.singnboard_tax').val();
            var parse_singnboard_tax = parseInt(singnboard_tax);

             var fee = $('.fee').val();
            var parse_fee = parseInt(fee);

            var vat = 15;
            var parse_vat = parseInt(vat);

            $('.total').val(parse_fee+parse_vat+parse_singnboard_tax+parse_business_tax);
        });

        $(document).on('input', '.others', function(){

            var other = $('.others').val();
             var parse_other = parseInt(other);
            var business_tax = $('.business_tax').val();

          var parse_business_tax = parseInt(business_tax);

           var singnboard_tax = $('.singnboard_tax').val();
            var parse_singnboard_tax = parseInt(singnboard_tax);

             var fee = $('.fee').val();
            var parse_fee = parseInt(fee);

            var vat = 15;
            var parse_vat = parseInt(vat);

            $('.total').val(parse_fee+parse_vat+parse_singnboard_tax+parse_business_tax+parse_other);
        });
         
    $(document).on("change", ".mobile", function(){
        
        var mobile = $('.mobile').val();
        var len = $('.mobile').val().length;
        if(mobile == ""){
          
        }
        else if(len == '11'){
            $.ajax({
                 url: "{{  url('/check-mobile_hold_number') }}", 

                           type:"GET",
                           data:{'mobile':mobile},
                           dataType:"html",
                           success:function(data) {
                              
                              if(data == "data_exist")
                              {
                                  toastr.error("Already This Mobile Number has been exist");
                              }
                              
                            
                              
                           },
                
               });
        }

        else{
          toastr.error("Mobile Number Should be Atleast 11 character");
        }
       
    });


     $(document).on('input', '.birth_nid', function(){
          var birth_nid = $('.birth_nid').val();
          var attr = $(this).attr('name');

         $.ajax({
                 url: "{{  url('/check-hold_birth_nid') }}", 

                   type:"GET",
                   data:{'birth_nid':birth_nid,'attr':attr},
                   dataType:"html",
                   success:function(data) {
                      
                      if(birth_nid == ""){
                       
                      }
                      else if(data == 'birth_exist'){
                         toastr.error("Already, This Birth Certificate Number has been exist");
                         
                     }
                     else if(data == 'nid_exist'){
                        toastr.error("Already, This National ID Number has been exist");
                         
                     }
                     else{

                    }
                      
                     
                    
                      
                   },
        
       });

     });


     $(document).on("click", ".remove_image", function(e){
    e.preventDefault();
       var id = $(this).data("id");
        $(".img_cont").css("display", "none");

        $.ajax({
           url: "{{  url('/remove-business_hold_image/') }}/"+id,
           type:"GET",
           dataType:"html",
           success:function(data) {
             //$("#sub_category").html(data);
             //$("#"+id).remove();
              
         
             console.log(data);
           },
                    
        }); 
    
 });
  

  });


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