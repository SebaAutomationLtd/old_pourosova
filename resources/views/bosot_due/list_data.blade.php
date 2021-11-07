@extends('admin_master')
@section('admin_content')
 
 <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>ট্রেড লাইসেন্স বকেয়া</h5>
            </div>

           <div class="card-body">
              

             <div class="search">
                                <form action="{{URL::to('/new_filter_bosot_due_list')}}" method="get">
                                @csrf  
                                    <div class="form-row">
                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="ward_id">ওয়ার্ড</label>
                                            <select name="ward_id" id="ward_id" class="form-control">
                                               <option value="" selected="" disabled="">ওয়ার্ড</option>
                                              @php
                                               $wards = DB::table('wards')->orderBy('id', 'DESC')->get();
                                              @endphp
                                              @foreach($wards as $ward)
                                              <option value="{{$ward->id}}">{{$ward->ward_no}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="village_id">গ্রাম</label>
                                            <select name="village_id" id="village_id" class="form-control">
                                                <option value="" selected="" disabled="">গ্রাম</option>
                                               
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="end_year">অর্থ বছর</label>
                                            <select id="end_year" class="form-control">

                                            	<option value="" selected="" disabled="">অর্থ বছর</option>
                                           	@for($i=2016; $i<=$year; $i++)
                                           	  <option value="{{$i}}">{{$i}}-{{$i+1}}</option>

                                           	@endfor
                                           </select>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-6">
                                            <label for="" style="color: rgba(0,0,0,0);">saf</label> <br>
                                            <button type="submit" class="btn btn-primary filter">Search</button>
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
                          <th>মোবাইল নং</th>
                          <th>বকেয়া অর্থ বছর শুরু</th>
		       	        <th>যে সময় পর্যন্ত বকেয়া</th>
		       	        <th>মোট বকেয়া ( টাকা )</th>
		       	        <th>Action</th>
                         </tr>
                       </thead>     
                       <tbody>
                        @foreach($all as $key=>$row)
                       	 <tr>
                       	  <td>{{$key+1}}</td>
                       	  <td>{{$row->name}}</td>
                       	  @if($row->nid == NULL)
                       	   <td>{{$row->birth_certificate}}</td>
                       	  @else
                       	   <td>{{$row->nid}}</td>
                       	  @endif

                       	  <td>{{$row->mobile}}</td>
                       	  @php
                       	   $year = date('Y');
                       	   $count = DB::table('pay_bosot_dues')
                       	         ->where('data_id',$row->id)
                       	         ->count();
                       	     $due_cost = $year - $row->last_tax_year+1;
                       	  @endphp
                       	  @if($row->last_tax_year == $year)
			                 <td>-</td>
			                @elseif($count > 0)
			                @for($i=$row->last_tax_year+1; $i<=$year; $i++)
			                <td>
			                
			                  {{$i}}-{{$i+1}}
			              
			                </td>
			                  @endfor	
			                 @else
			                  <td>{{$row->last_tax_year}}-{{$row->last_tax_year+1}}</td>
			                @endif

			                @if($row->last_tax_year == $year)
			                 <td>-</td>
			                @else
			                 <td>{{$year}}-{{$year+1}}</td>
			                @endif
			                @if($count > 0)
			                 @php
			                  $show = DB::table('pay_bosot_dues')
                       	         ->where('data_id',$row->id)
                       	         ->get();
			                 @endphp
			                 @foreach($show as $val)
			                <td>{{$val->remain_due}}</td>
			                @endforeach
			                @else
			                <td>{{$due_cost * $row->yearly_vat}}</td>
			                @endif
			                <td>
			                 <a style="cursor: pointer; color: white;" class="btn btn-primary new_bosot_aday" data-id="{{$row->id}}">আদায়</a>
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

 <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">আদায়</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{URL::to('/insert-new_bosot_due')}}" method="post">
      	@csrf
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary final_aday_trade">আদায়</button>
      </div>
    </div>
  </div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
 	$(document).on('click', '.new_bosot_aday', function(e){
 		e.preventDefault();
 		var id = $(this).data('id');
 		$('.modal').modal('show'); 

 		 $.ajax({
                 url: "{{  url('/aday-new_bosot_due') }}", 

                   type:"GET",
                   data:{'id':id},
                   dataType:"html",
                   success:function(data) {
                      $('.modal-body').html(data);
                   },
        
       });
 		
 	});

 	$('.close_modal').click(function(e){
 		e.preventDefault();
 		$('.modal').modal('hide');
 	});


 	$(document).on('input', '#paid_amount', function(){
 		var total_due_amount = $('#total_due_amount').val();
 		var parse_total_due_amount = parseInt(total_due_amount);
 		var paid_amount = $('#paid_amount').val();
 		var parse_paid_amount =parseInt(paid_amount);
 		if(paid_amount == ''){
 			$('#last_due').val('');
 		}
 		else{
 			$('#last_due').val(parse_total_due_amount-parse_paid_amount); 
 		}
 		
 	});


  $(document).on('change', '#ward_id', function(){
      var id = $('#ward_id').val();

      $.ajax({
                 url: "{{  url('/get-ward_village_data') }}", 

                   type:"GET",
                   data:{'id':id},
                   dataType:"html",
                   success:function(data) {
                      $("#village_id").html(data);
                   },
        
       });
    });

//  	$(document).on('click', '.final_aday_trade', function(e){
//  		e.preventDefault();
//  		var data_id = $('.trade_aday').data('id');
//  	    var user_id = $('.user_id').val();
//  	    var due_years = $(".years :checked").map(function(i, el) {
//     return $(el).val();
// }).get();
 	   
//  	    var paid_amount = $("#paid_amount").val();
//  	    var last_due = $("#last_due").val();
//  	    $.ajax({
//                  url: "{{  url('/insert-trade_due') }}", 

//                    type:"GET",
//                    data:{'data_id':data_id, 'user_id':user_id, 'due_years':due_years, 'total_due_amount':total_due_amount, 'paid_amount':paid_amount, 'last_due':last_due},
//                    dataType:"html",
//                    success:function(data) {
//                    	// window.location.reload();
//                     //   if(data == 'update' || data == 'insert')
//                     //   {    

//                     //   	   toastr.success("Payment Paid");
//                     //   }
//                     alert(data);
//                    },
        
//        });
//  	});
 });
</script>
@endsection