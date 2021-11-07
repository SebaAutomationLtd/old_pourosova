@extends('admin_master')
@section('admin_content')
 
 <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>  ফি সেটআপ </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active"> ফি সেটআপ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary website-form">
                       <div class="card-header">
                            <h3 class="card-title"> General ফি সেটআপ</h3>
                        </div>
                        <form role="form" action="{{route('update.general_fee')}}" enctype="multipart/form-data" method="post">
                            @csrf                            
                            <div class="card-body">
                            <div class="form-group">
                              <div class="row">
                               

                                
                                <div class="col-sm-12">
                                    <label for="general_fee" class="col-form-label">অনলাইন নিবন্ধন চার্জ সেট করুন <span style="color: red">*</span></label>
                                    <input type="text" name="general_fee" value="{{$data->general_fee}}" class="form-control" id="general_fee" placeholder="Online Register Charge">
                                   
                                </div>
                              </div>
                            </div>
                            </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">সংরক্ষণ</button>
                                </div>
                        </form>
                    </div>
                    <div class="card card-primary website-form">
                         <div class="card-header">
                            <h3 class="card-title"> Commercial ফি সেটআপ</h3>
                        </div>
                        <form role="form" action="{{route('update.commercial_fee')}}" method="post" enctype="multipart/form-data">
                            @csrf                            
                            <div class="card-body">
                                <div class="form-group">
                                  <div class="row">
                                   

                                    
                                    <div class="col-sm-12">
                                        <label for="commercial_fee" class="col-form-label">অনলাইন নিবন্ধন চার্জ সেট করুন  <span style="color: red">*</span></label>
                                        <input type="text" name="commercial_fee" value="{{$data->commercial_fee}}" class="form-control" id="commercial_fee" placeholder="Online Register Charge">
                                      
                                    </div>
                                  </div>
                                </div>
                                </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">সংরক্ষণ</button>
                                    </div>
                        </form>
                    </div>
                    <div class="card card-primary website-form">
                         <div class="card-header">
                            <h3 class="card-title"> Business ফি সেটআপ</h3>
                        </div>
                        <form role="form" action="{{route('update.business_fee')}}" method="post" enctype="multipart/form-data">
                            @csrf                            
                            <div class="card-body">
                                <div class="form-group">
                                  <div class="row">
                                   

                                    
                                    <div class="col-sm-12">
                                        <label for="business_fee" class="col-form-label">অনলাইন নিবন্ধন চার্জ সেট করুন  <span style="color: red">*</span></label>
                                        <input type="text" name="business_fee" value="{{$data->business_fee}}" class="form-control" id="business_fee" placeholder="Online Register Charge">
                                       
                                    </div>
                                  </div>
                                </div>
                                </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">সংরক্ষণ</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

  <!-- /.content-wrapper -->


@endsection