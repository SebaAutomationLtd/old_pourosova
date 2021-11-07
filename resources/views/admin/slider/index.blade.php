@extends('admin_master')
@section('admin_content')
  
<section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="margin-top: 20px;">
        <div class="col-sm-6">
            <h5>স্লাইডার লিস্ট</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active">স্লাইডার লিস্ট</li>
            </ol>
        </div>
    </div>
   <div class="row">
   <div class="col-md-12">
        <div class="card main-chart mt-4">
            <div class="card-header panel-tabs">
                <h5>স্লাইডার লিস্ট <a href="{{URL::to('/add-slider')}}" style="cursor: pointer; color: white;"
                                            class="btn btn-primary float-right business_pdf_download">Add New</a></h5>
            </div>

           
            <div class="card-body">

             
                <div class=""> 
                    <div class="table-data">
                        <table
                            class="table table-striped table-bordered datatable responsive nowrap table-hover"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>ক্রমিক </th>
                                    <th>Image</th>
                                  
                                    <th>একশন</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($all as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    
                                    <td>
                                     <img style="width: 100px; height: 100px;" src="{{URL::to($row->slider_image)}}">	
                                    </td>
                                   
                                   <td>
 									
 									<a href="{{URL::to('/edit-website_slider/'.$row->id)}}" class="btn btn-primary btn-sm">Edit</a>

 									<a href="{{URL::to('/delete-website_slider/'.$row->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>

                                   </td>
                                    
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