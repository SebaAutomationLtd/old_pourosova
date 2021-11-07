@extends('admin_master')
@section('admin_content')
  

   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>বসত বাড়ি বকেয়া আদায়</h5>
            </div>
            <div class="card-body">
              

             <div class="search">
                              <form action=" {{URL::to('/filtering-new_pay_bosot_bari')}}" method="post">
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
                                            <label for="start_year">শুরুর অর্থ বছর</label>
                                           <select class="form-control" name="start_year" id="start_year">
                                           	<option value="" selected="" disabled="">শুরুর অর্থ বছর</option>
                                           	@for($i=2016; $i<=$year; $i++)
                                           	  <option value="{{$i}}">{{$i}}-{{$i+1}}</option>
                                           	@endfor
                                           </select>
                                        </div>



                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="end_year">শেষের অর্থ বছর</label>
                                           <select class="form-control" name="end_year" id="end_year">
                                           	<option value="" selected="" disabled="">শুরুর অর্থ বছর</option>
                                           	@for($i=2016; $i<=$year; $i++)
                                           	  <option value="{{$i}}">{{$i}}-{{$i+1}}</option>
                                           	@endfor
                                           </select>
                                        </div>

                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="start_date">শুরুর তারিখ</label>
                                        

                                            	
                                            <input type="date" id="start_date" name="start_date" class="form-control">
                                           </select>
                                        </div>

                                         <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="end_date">শেষ তারিখ</label>
                                          

                                            	
                                            <input type="date" id="end_date" name="end_date" class="form-control">
                                           </select>


                                        </div>
                                      <button type="submit" class="btn btn-primary filter">Search</button>
                                     </form>   
                                    </div>

                            
                            </div>

                <table class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                        style="width:100%;">

         <thead>
           <tr>
            <th>ক্রমিক নং</th>
            <th>কর দাতার নাম</th>
           
            <th>এনআইডি/জন্ম নিবন্ধন নং</th>
            <th>মোবাইল নং</th>
            <th>বকেয়া অর্থ বছর শুরু</th>
            <th>যে সময় পর্যন্ত বকেয়া</th>
            <th>মোট বকেয়া</th>
           
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
                @if($row->last_tax_year == $year)
                 <td>-</td>
                @else
                <td>{{$row->last_tax_year + 1}}-{{$row->last_tax_year + 2}}</td>
                @endif
                 @if($row->last_tax_year == $year)
                 <td>-</td>
                @else
                 <td>{{$year}}-{{$year+1}}</td>
                @endif
                @php
                  $due_cost = $year - $row->last_tax_year;
                @endphp
                @if($row->last_tax_year == $year)
                @if($row->remain_due == 0)
                 <td>-</td>
                @else
                 <td>{{$row->remain_due}}</td>
                 @endif 
                @else
                <td>{{$due_cost * $row->yearly_vat}} BDT</td>
                
                @endif
               
               </tr>
               @endforeach
         </tbody>
        </table>
            </div>


        </div>
    </div>






  <div id="my_modal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
  $(document).ready(function(){
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

  	// $(document).on('click', '.filter', function(e){
  	// 	e.preventDefault();
  	// 	var ward_id = $('#ward_id').val();
  	// 	var village_id = $("#village_id").val();
  	// 	var start_year = $("#start_year").val();
  	// 	var end_year = $("#end_year").val();
  	// 	var start_date = $("#start_date").val();
  	// 	var end_date = $("#end_date").val();
  	// 	$.ajax({
   //               url: "{{  url('/filter-pay_bosot_bari') }}", 

   //                 type:"GET",
   //                 data:{'ward_id':ward_id, 'village_id':village_id, 'start_year':start_year, 'end_year':end_year, 'start_date':start_date, 'end_date': end_date},
   //                 dataType:"html",
   //                 success:function(data) {
   //                    $('.conts').html(data);
   //                    dataTable();
   //                 },
        
   //     });

     
  	// });


  	

  	
  });

  function dataTable(){
    $('#example').DataTable();
  }
</script>
@endsection 