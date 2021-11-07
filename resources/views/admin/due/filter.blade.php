@extends('admin_master')
@section('admin_content')
  

   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>বসত বাড়ি বকেয়া</h5>
            </div>
            <div class="card-body">
              

             <div class="search">
                               
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
                                            <label for="end_year">শেষ অর্থ বছর</label>
                                            <select id="end_year" class="form-control">

                                            	<option value="" selected="" disabled="">শেষ অর্থ বছর</option>
                                           	@for($i=2016; $i<=$year; $i++)
                                           	  <option value="{{$i}}">{{$i}}-{{$i+1}}</option>

                                           	@endfor
                                           </select>
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-6">
                                            <label for="" style="color: rgba(0,0,0,0);">saf</label> <br>
                                            <button type="button" class="btn btn-primary filter">Search</button>
                                        </div>
                                    </div>

                            
                            </div>

             <div class="conts" style="margin-top: 20px;">
             </div>
            </div>


        </div>
    </div>




<!-- Modal -->
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
        <h5 style="padding: 10px;">Business Holder Summary</h5>
      <hr>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
         
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

  	$(document).on('click', '.filter', function(e){
  		e.preventDefault();
  		var ward_id = $('#ward_id').val();
  		var village_id = $("#village_id").val();
  		var start_year = $("#start_year").val();
  		var end_year = $("#end_year").val();
  		$.ajax({
                 url: "{{  url('/search-bosot_due') }}", 

                   type:"GET",
                   data:{'ward_id':ward_id, 'village_id':village_id, 'start_year':start_year, 'end_year':end_year},
                   dataType:"html",
                   success:function(data) {
                      $('.conts').html(data);
                      dataTable();
                   },
        
       });

     
  	});
  });

  function dataTable(){
    $('#example').DataTable();
  }
</script>
@endsection