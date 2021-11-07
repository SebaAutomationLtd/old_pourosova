@extends('admin_master')
@section('admin_content')


<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="padding-top:20px ">
        <div class="col-sm-6">
          <h4>নতুন চেয়ারম্যান</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">হোম</a></li>
            <li class="breadcrumb-item active">নতুন চেয়ারম্যান</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <div class="row">
                <div class="col-sm-6">
                  <h4>নতুন চেয়ারম্যান যোগ করুন</h4>
                </div>

                <div class="col-sm-6">
                  <a style="float: right;" href="{{route('chairmen.list')}}" class="btn btn-primary">চেয়ারম্যান তালিকা</a>
                </div>
              </div>
              
              
            </div><!-- /.card-header -->
            <div class="container col-lg-4">

      
</div>            <div class="card-body">
              <div class="tab-content">

                <div class="active tab-pane" id="settings"><br><br>
                  <form class="needs-validation" action="{{route('store.chairmen')}}" method="post" novalidate enctype="multipart/form-data">
                    @csrf                    
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">নাম
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="chairmen_name" placeholder="নাম" required="">
                       
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">ঠিকানা
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <textarea class="form-control" name="chairmen_address" placeholder="ঠিকানা" required=""></textarea>
                                            
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">মোবাইল
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="mobile" placeholder="মোবাইল" required>
                       
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">ইমেল
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control" name="email" placeholder="ইমেল" required>
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">বক্তব্য
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <textarea type="text" class="form-control" id="summernote" name="speech" placeholder="বক্তব্য" required=""></textarea>
                        
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">ছবি</label>
                        <div class="col-sm-7">                    
                         <input type="file" class="form-control" name="chaimen_image" required="" />
                         
                        </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">স্বাক্ষর</label>
                      <div class="col-sm-7">                    
                       <input type="file" class="form-control" name="chaimen_image_singnature"/>
                       
                      </div>
                  </div>  
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">সংরক্ষণ</button>
                        <a href=""
                          style='background: #a7a4a4; border-color: #9a9da0;' class="btn btn-primary">
                          <i class="fas fa-window-close"></i> বাতিল</a>
                      </div>
                    </div>
                  </form><br><br>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection