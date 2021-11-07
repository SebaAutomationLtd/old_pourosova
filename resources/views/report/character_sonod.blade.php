@extends('admin_master')
@section('admin_content')
  
<section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>
চারিত্রিক সনদ রিপোর্ট
</h5> 
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active">
চারিত্রিক সনদ রিপোর্ট
</li>
            </ol>
        </div>
    </div>
   <div class="row">
   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>
চারিত্রিক সনদ রিপোর্ট
 </h5>
            </div>


            
           
            <div class="card-body">
              
              <div class="mb-3">
                 <form action="{{ URL::to('/filter-data_character_report')}}" method="get">
                                  @csrf
                                <div class="row">
                                    <div class="col-lg-5 col-md-7 col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select style="width: 205px;" id="ward_id"
                                                    style="border-radius: .25rem 0 0 .25rem;" name="report"
                                                    class="form-control form-control-sm">
                                                    <option value="" disabled selected>নির্বাচন করুন
                                                    </option>
                                                   <option value="today">আজকের রিপোর্ট</option>
                                                   <option value="last_week">শেষ সাত দিনের রিপোর্ট</option>
                                                 
                                                </select>
                                            </div>
                                           

                                             

                                            <div class="input-group-append">
                                                <button class="btn btn-success btn-sm"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              </form>
              </div>


               @php
     $total = DB::table('charater_certificates')->count()
    @endphp
    <h6 style="margin-left: 20px; margin-top: 10px;">মোট: {{$total}} টি</h6>

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
                                    
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($all as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    
                                    <td>
                                     {{$row->name}}
                                    </td>
                                    @if($row->nid == NULL)
                                   <td>{{$row->birth_certificate}}</td>
                                   @else
                                   <td>{{$row->nid}}</td>
                                   @endif
                                 
                                   <td>{{$row->mobile}}</td>

                                   
                                   
                                    
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



@endsection