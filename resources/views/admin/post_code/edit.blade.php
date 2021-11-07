@extends('admin_master')
@section('admin_content')


<div class="content-wrapper">
    <!-- Content Header (Page header) --> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2" style="margin-top: 20px">
          <div class="col-sm-6">
            <h4>আপডেট পোস্ট কোড</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">আপডেট পোস্ট কোড</li>
            </ol>
          </div>
        </div>
        <div class="row">
        
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
              </div><!-- /.card-header -->
              <div class="container col-lg-4">

      
</div>              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="settings"><br><br>
                    <form class="form-horizontal" action="{{route('update.post_code',$edit->id)}}" method="post" class="needs-validation">
                       @csrf   
                       <input type="hidden" name="post_code_id" value="{{$edit->id}}">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">পোস্ট কোড<span style="color: red">*</span></label>
                        <div class="col-sm-8">
                          
                          <input type="text" class="form-control post_code @error('post_code') is-invalid @enderror" name="post_code" placeholder="পোস্ট কোড" value="{{$edit->post_code}}">

                          @error('post_code')
                              <small class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </small>
                          @enderror
                        </div>
                         <div class="invalid-feedback">অনুগ্রহ করে এই ঘরটি পুরন কর.</div>
                      </div>                          
                                           
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{route('post.code')}}" style='background: #a7a4a4; border-color: #9a9da0;' class="btn btn-primary"><i class="fas fa-window-close"></i> বাতিল</a>
                          <button type="submit" class="btn btn-success save_post_code">আপডেট</button>
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
  </div>
  <!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection