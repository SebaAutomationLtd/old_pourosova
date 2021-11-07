@extends('admin_master')
@section('admin_content')


<div class="content-wrapper"> 

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="padding-top: 20px">
        <div class="col-sm-6">
          <h4>আপডেট মেয়র</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">হোম</a></li>
            <li class="breadcrumb-item active">আপডেট</li>
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
                  <h4>আপডেট মেয়র</h4>
                </div>

                <div class="col-sm-6">
                  <a style="float: right;" href="{{route('chairmen.list')}}" class="btn btn-primary">মেয়র তালিকা</a>
                </div>
              </div>
              
              
            </div><!-- /.card-header -->
            <div class="container col-lg-4">

      
</div>            <div class="card-body">
              <div class="tab-content">

                <div class="active tab-pane" id="settings"><br><br>
                  <form class="needs-validation" action="{{route('update.chairmen',$edit->id)}}" method="post" novalidate enctype="multipart/form-data">
                    @csrf                    
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">নাম
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="chairmen_name" placeholder="নাম" value="{{$edit->chairmen_name}}">
                       
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">ঠিকানা
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <textarea class="form-control" name="chairmen_address" placeholder="ঠিকানা">{{$edit->chairmen_address}}</textarea>
                                            
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">মোবাইল
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="mobile" placeholder="মোবাইল" value="{{$edit->mobile}}">
                       
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">ইমেল
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control" name="email" placeholder="ইমেল" value="{{$edit->email}}">
                        
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">বক্তব্য
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <textarea type="text" class="form-control" id="summernote" name="speech" placeholder="বক্তব্য">{{$edit->speech}}</textarea>
                        
                      </div>
                    </div>
                    @if($edit->chaimen_image == NULL)
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">ছবি</label>
                      <div class="col-sm-7">                    
                       <input type="file" class="form-control" name="chaimen_image" />
                       
                      </div>
                    </div>  
                    @else 
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">ছবি</label>
                      <div class="col-sm-5">                    
                       <input type="file" class="form-control" name="chaimen_image" /> 
                      </div>
                      <div class="col-sm-2">
                        <img  style="width: 100px; height: 80px;" src="{{URL::to($edit->chaimen_image)}}">
                       </div>
                    </div>
                    @endif 

                    @if($edit->chaimen_image_singnature == NULL)
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">স্বাক্ষর</label>
                      <div class="col-sm-7">                    
                       <input type="file" class="form-control" name="chaimen_image_singnature"/>
                       
                      </div>
                      </div>
                     @else 
                     <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">স্বাক্ষর</label>
                      <div class="col-sm-5">                    
                       <input type="file" class="form-control" name="chaimen_image_singnature"/> 
                      </div>
                      <div class="col-sm-2">
                        <img  style="width: 100px; height: 80px;" src="{{URL::to($edit->chaimen_image_singnature)}}">
                       </div>
                      </div>
                      @endif

                    
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">আপডেট</button>
                       
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