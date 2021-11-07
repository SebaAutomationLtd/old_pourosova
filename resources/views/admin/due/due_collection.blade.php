@extends('admin_master')
@section('admin_content')
  

   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>বসত বাড়ি বকেয়া আদায়</h5>
            </div>
            <div class="card-body">
              
              <form action="{{URL::to('/collection-bosot_due/'.$data->id)}}" method="post">
              	@csrf
              	<div class="row">
                  <div class="col-md-6">
                  	<label for="name">কর দাতার নাম</label>
                  	<input type="text" name="name" class="form-control" value="{{$data->name}}" readonly="">
                  </div>

              	

              	<div class="col-md-6">
              	  @if($data->birth_certificate == NULL) 
                   <label for="nid">এনআইডি</label>
                  	<input type="text" name="nid" class="form-control" value="{{$data->nid}}" readonly="">
                  @else
                   <label for="birth_certificate">জন্ম নিবন্ধন নং</label>
                  	<input type="text" name="birth_certificate" class="form-control" value="{{$data->birth_certificate}}" readonly="">
                  @endif
              	</div>
                 @if($data->last_tax_year == $year)
                 @else
                <div class="col-md-3" style="margin-top: 30px;">
                	 <h6>অর্থ বছর সমূহ</h6>
                	  @for($i=$data->last_tax_year+1; $i<=$year; $i++)
                   <input type="checkbox" class="years" name="due_years[]" id="{{$i}}" value="{{$i}}">  

                    <input type="hidden" name="update_last_tax_year[]" value="{{$i}}">
                   <label style="cursor: pointer;" for="{{$i}}"><span class="cont">{{$i}}-{{$i+1}}</span></label><br>
                   @endfor
                </div>
                @endif
                <div class="col-md-3"  style="margin-top: 30px;">
                 <label for="due_amount">
					মোট বকেয়া ( টাকা )
					</label>
				@if($data->last_tax_year == $year)
				@php
				 $info = DB::table('pay_bosot_taxes')->where('data_id', $data->id)->first();
				@endphp
				 <input type="text" name="total_due_amount" id="total_due_amount" class="form-control" value="{{$info->remain_due}}" readonly="">
				@else
				@php
                  $due_cost = $year - $data->last_tax_year;
                @endphp
			     <input type="text" name="total_due_amount" id="total_due_amount" class="form-control" value="{{$due_cost * $data->yearly_vat}}" readonly="">
			    @endif
                </div>

                <div class="col-md-3">
                  <label for="paid_amount" style="margin-top: 30px;">পরিশোধ</label>
                  <input type="text" name="paid_amount" id="paid_amount" class="form-control" placeholder="পরিশোধ">
                </div>

                 <div class="col-md-3">
                  <label for="last_due" style="margin-top: 30px;">অবশিষ্ট বকেয়া</label>
                  <input type="text" id="last_due" name="last_due" class="form-control" placeholder="অবশিষ্ট বকেয়া" readonly="">
                </div>
              	
              	</div>
              	<button type="submit" class="btn btn-success">আদায়</button>
              </div>


              </form>  
            
            </div>


        </div>
    </div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
 $(document).ready(function(){
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
 });
</script>

@endsection