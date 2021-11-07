@extends('admin_master')
@section('admin_content')
  
<section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>বসত বাড়ি কর রিপোর্ট</h5> 
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active">বসত বাড়ি কর রিপোর্ট</li>
            </ol>
        </div>
    </div>
   <div class="row">
   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>বসত বাড়ি কর রিপোর্ট </h5>
            </div>


            
           
            <div class="card-body">
              
              <div class="mb-3">
                 <form action="{{ URL::to('/filter-data_bosot_report')}}" method="get">
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
                                                   <option value="current_month">
													চলতি মাসের রিপোর্ট
													</option>
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
     $total = DB::table('pay_bosot_dues')->count()
    @endphp
    <h6 style="margin-left: 20px; margin-top: 10px;">মোট: {{$total}} জন</h6>

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
                          <th>বকেয়া অর্থ বছর শুরু</th>
                    <th>যে সময় পর্যন্ত বকেয়া</th>
                    <th>মোট বকেয়া ( টাকা )</th>
                   
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
                          @php
                           $year = date('Y');
                           $count = DB::table('pay_bosot_dues')
                                 ->where('data_id',$row->id)
                                 ->count();
                             $due_cost = $year - $row->last_tax_year+1;
                          @endphp
                          @if($row->last_tax_year == $year)
                       <td>-</td>
                      @elseif($count > 0)
                      @for($i=$row->last_tax_year+1; $i<=$year; $i++)
                      <td>
                      
                        {{$i}}-{{$i+1}}
                    
                      </td>
                        @endfor 
                       @else
                        <td>{{$row->last_tax_year}}-{{$row->last_tax_year+1}}</td>
                      @endif

                      @if($row->last_tax_year == $year)
                       <td>-</td>
                      @else
                       <td>{{$year}}-{{$year+1}}</td>
                      @endif
                      @if($count > 0)
                       @php
                        $show = DB::table('pay_bosot_dues')
                                 ->where('data_id',$row->id)
                                 ->get();
                       @endphp
                       @foreach($show as $val)
                      <td>{{$val->remain_due}}</td>
                      @endforeach
                      @else
                      <td>{{$due_cost * $row->yearly_vat}}</td>
                      @endif
                      
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