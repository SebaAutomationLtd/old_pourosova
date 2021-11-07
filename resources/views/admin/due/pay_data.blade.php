<!Doctype html>
<html>
 
 <head>
   <meta charset="UTF-8">
   <title>Due Data</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

   <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
 </head> 

 
 <body>
    
    <div class="row">
    	
       <div class="col-md-12 col-sm-10">
       	
       	  <table  class="table table-striped table-bordered table-sm">
		     <thead>
		       <tr>
		       	<th>ক্রমিক নং</th>
		       	<th>কর দাতার নাম</th>
		       
		       	<th>এনআইডি/জন্ম নিবন্ধন নং</th>
		       	<th>মোবাইল নং</th>
		       	<th>বকেয়া অর্থ বছর শুরু</th>
		       	<th>যে সময় পর্যন্ত বকেয়া</th>
		       	<th>মোট বকেয়া</th>
		       	<th>আদায়</th>
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
                <td>{{$due_cost * $row->yearly_vat}} BDT</td>

                <td>
                 <a href="{{URL::to('/due-aday/'.$row->id)}}" class="btn btn-primary btn-sm aday" data-id="{{$row->id}}">আদায়</a>
                </td>
               </tr>
               @endforeach
		     </tbody>
		    </table>
       </div>
     </div>
    

  

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

   



   
 </body>


</html>