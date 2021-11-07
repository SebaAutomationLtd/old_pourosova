@extends('member_master')
@section('member_content')

  

		@php
        $user_id = Auth::user()->user_id;
         $renew_license = DB::table('renew_licenses')->where('user_id',$user_id)->first();

        @endphp
<div class="col-lg-9 mt-4 mt-lg-0">
    <div class="dashboard-body">
        <div class="content-header" style="padding: 20px;">
        	 @if($renew_license->payment_type == NULL && $renew_license->payment_status == '0')
            <span style="padding: 12px; color: white;">লাইসেন্স নবায়ন ফী পরিশোধ করুন</span>
            @else
             <span style="padding: 12px; color: white;">এডমিনের অনুমোদনের জন্য অপেক্ষা করুন</span>
            @endif
        </div>
        
        @if($renew_license->payment_type == NULL && $renew_license->payment_status == '0')
        <div class="content py-5">
          আপনার লাইসেন্স ফি {{$trade_total}} টাকা পরিশোধ করতে <a href="{{URL::to('/paid-renew_fee')}}">এখানে ক্লিক</a> করুন
        </div>
        @elseif($renew_license->payment_type !== NULL && $renew_license->payment_status == '0')
        <div class="content py-5">
          আপনার লাইসেন্স নবায়ন আবেদনটি এডমিনের কাছে পাঠানো হয়েছে. অনুগ্রহ করে এডমিনের অনুমোদনের জন্য অপেক্ষা করুন.
        </div>

        @elseif($renew_license->payment_type !== NULL && $renew_license->payment_status == '1')
          <div class="content py-5">

       আপনার লাইসেন্স নবায়নের আবেদনটি অনুমোদিত হয়েছে. লাইসেন্স পিডিএফ ডাউলোড করতে <a style="cursor: pointer"  class="pdf" id="pdf"><span style="color: blue;">এখানে ক্লিক</span></a> করুন.
         </div>
        @endif
     </div>
 </div>
 
  





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ jspdf/1.3.2/jspdf.min.js"></script>

    <script>
     $(document).ready(function($){
        $(document).on('click', '.pdf', function(e){
          e.preventDefault();
              $.ajax({
                    url: "{{  url('/print_license_pdf') }}",

                    type: "GET",
                   
                    dataType: "html",
                    success: function(data) {

                        var opt = 
                        {
                          margin:       0,
                          filename:     'trade_license_'+js.AutoCode()+'.pdf',
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

