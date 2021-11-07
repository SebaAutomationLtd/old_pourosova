@extends('member_master')
@section('member_content')
<link href="https://cdn.datatables.net/autofill/2.3.7/css/autoFill.bulma.min.css">
 <div class="col-lg-9 mt-4 mt-lg-0">
   <div class="dashboard-body">
       <div class="content-header" style="padding: 15px;">
	    
মৃত্যু সনদসমূহ

	    </div>
	</div>
	
	<table id="example" class="table table-striped table-bordered datatable responsive nowrap table-hover">
	    <thead>
	       <tr>
	        <th>ক্রমিক নং</th>
	        <th>নাম</th>
	        <th>এনআইডি/জন্মনিবন্ধন</th>
	     
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
	        
	        
	        
	        <td>
	         @if($row->status == '1')
	         
	         <a data-toggle="tooltip" 
                    href="#" title="একটিভ "
                    class="btn btn-success btn-sm"><i
                        class="far fa-check-circle"></i>
                </a>
	          
	           <a style="color: white;" href="{{URL::to('/my-dead_details/'.$row->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
	           
	           
	          
	         @else
	          <span class="badge badge-danger">Pending</span>
	         @endif
	        </td>
	       </tr> 
	       
	    @endforeach
	    </tbody>
	</table>
	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


@endsection