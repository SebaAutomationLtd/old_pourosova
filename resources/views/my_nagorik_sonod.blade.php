@extends('member_master')
@section('member_content')
<link href="https://cdn.datatables.net/autofill/2.3.7/css/autoFill.bulma.min.css">
 <div class="col-lg-9 mt-4 mt-lg-0">
   <div class="dashboard-body">
       <div class="content-header" style="padding: 15px;">
	    নাগরিক সনদসমূহ
	    </div>
	</div>
	
	<table id="example" class="table table-striped table-bordered datatable responsive nowrap table-hover">
	    <thead>
	       <tr>
	        <th>ক্রমিক নং</th>
	        <th>নাম</th>
	        <th>এনআইডি/জন্মনিবন্ধন</th>
	        <th>মোবাইল</th> 
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
	        
	        <td>
	         @if($row->status == '1')
	         
	         <a data-toggle="tooltip" 
                    href="#" title="একটিভ "
                    class="btn btn-success btn-sm"><i
                        class="far fa-check-circle"></i>
                </a>
	          
	           <a style="color: white;" href="{{URL::to('/my-nagorik_details/'.$row->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
	           
	           
	          
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

    <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ jspdf/1.3.2/jspdf.min.js"></script>
 <script src="{{asset('qr/jquery.qrcode.min.js"')}}"></script>

 <script>
   $(document).ready(function($){
   	  $(document).on('click', '.my_nagorik_pdf', function(e){
   	  	 e.preventDefault();
   	  	 var id = $(this).data('id');
   	  	 var verified_nagorik_id = $('.verified_nagorik_id').val();
   	  	 var width = 100;
   	  	 var height = 100;
   	  	 
   	  
   	  	 $.ajax({
                    url: "{{  url('/pdf-nagorik_pdf') }}",

                    type: "GET",
                    data:{'id':id},
                    dataType: "html",
                    success: function(data) {

                    
                        var opt = 
                        {
                          margin:       0,
                          filename:     'nagorik_certitificate_'+js.AutoCode()+'.pdf',
                          image:        { type: 'jpeg', quality: 0.98 },
                          html2canvas:  { scale: 2},
                          jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
                        };

                       
                        html2pdf().set(opt).from(data).save();

                        //generateQRcode(width, height, verified_nagorik_id );
                           
                      
                    },

                });
   	  });
   });
   
    
    function generateQRcode(width, height, text) {
	  	 $('#qrcode_nagork').qrcode({width: width,height: height,text: text});
	  }
	  
	    
 </script>
@endsection