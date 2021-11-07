@extends('member_master')
@section('member_content')
 
 <div class="col-lg-9 mt-4 mt-lg-0">
   <div class="dashboard-body">
  
   	  @if($data->status == '0')
       <div class="content-header">
	        আপনার অনুরোধটি এডমিনের কাছে পাঠানো হয়েছে.
	    </div>
	    <div class="content py-5">
	    	আপনার অনুরোধটি এডমিনের কাছে পাঠানো হয়েছে. এডমিনের অনুমতির জন্য অপেক্ষা করুন
	    </div>
	 @else
	  <div class="content-header">
	        আপনার অনুরোধটি মঞ্জুর হয়েছে.
	    </div>

	    <div class="content py-5">
	    	আপনার চারিত্রিক সনদটি ডাউনলোড করতে <a style="cursor: pointer"  class="character_pdf" id="character_pdf"><span style="color: blue;">এখানে ক্লিক</span></a> করুন.করুন
	    </div>
	  
	  
	 @endif

	     <div class="content py-5">
	     	<p></p>
	     </div>
	</div>
</div>

 

 
    
    <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script>
   $(document).ready(function($){
   	  $(document).on('click', '.character_pdf', function(e){
   	  	 e.preventDefault();
   	  	 $.ajax({
                    url: "{{  url('/pdf-character_certficate') }}",

                    type: "GET",
                   
                    dataType: "html",
                    success: function(data) {

                    
                        var opt = 
                        {
                          margin:       0,
                          filename:     'charcter_certificate_'+js.AutoCode()+'.pdf',
                          image:        { type: 'jpeg', quality: 0.98 },
                          html2canvas:  { scale: 2},
                          jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' }
                        };

                        // New Promise-based usage:
                        html2pdf().set(opt).from(data).save();



                    },

                });
   	  });
   });
 </script>
@endsection