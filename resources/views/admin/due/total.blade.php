@extends('admin_master')
@section('admin_content')
 
  <div class="content-wrapper">
     <section class="content">
       <div class="container-fluid">
       	 <div class="row mb-2" style="margin-top: 20px;">
            <div class="col-sm-6">
                <h5>বসতবাড়ি বকেয়াসমূহ</h5>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">হোম</a></li>
                    <li class="breadcrumb-item active">বসত বাড়ি বকেয়াসমূহ</li>
                </ol>
            </div>
        </div>

        <div class="row">
           <div class="col-md-12">
           	 <div class="card card-warning">
           	 	<div class="card">
           	 	  <div class="card-header">
                    <h3 class="card-title">বসত বাড়ি বকেয়াসমূহ</h3>
                </div>

                 <div class="card-body">
                 	<div class="mb-3">
                 	  <table class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                        style="width:100%">

                        <thead>
                          <tr>
                          	
                          	<th>ক্রমিক নং</th>
                          	<th>কর দাতার নাম</th>
                          	
                          	<th>মোবাইল নং</th>
                          	<th>এনআইডি/জন্ম নিবন্ধন নং</th>
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
                 <td>No Due</td>
                @else
                <td>{{$row->last_tax_year + 1}}-{{$row->last_tax_year + 2}}</td>
                @endif
                 @if($row->last_tax_year == $year)
                 <td>No Due</td>
                @else
                 <td>{{$year}}-{{$year+1}}</td>
                @endif
                @php
                  $due_cost = $year - $row->last_tax_year;
                @endphp
                <td>{{$due_cost * $row->yearly_vat}} BDT</td>
               </tr>
               @endforeach
		     </tbody>

                      </table>
                                        
                 	</div>
                 </div>
           	 	</div>
           	 </div>
           </div>
        </div>
       </div>
     </section>

  </div>


@endsection