@extends('admin_master')
@section('admin_content')
 <div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2" style="margin-top: 20px">
        <div class="col-sm-6">
          <h4>ওয়ার্ড আপডেট করুন</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">হোম</a></li>
            <li class="breadcrumb-item active">ওয়ার্ড আপডেট করুন</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <h4>ওয়ার্ড আপডেট করুন</h4>
            </div><!-- /.card-header -->
            <div class="container col-lg-4">

      
</div>            <div class="card-body">
              <div class="tab-content">

                <div class="active tab-pane" id="settings"><br><br>
                  <form class="needs-validation" action="{{route('update.ward',$edit->id)}}" method="post">
                   @csrf                    
                    

                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">ওয়ার্ড নং
                        <span style="color: red">*</span>
                      </label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control  @error('ward_no') is-invalid @enderror" name="ward_no" placeholder="ওয়ার্ড নং" value="{{$edit->ward_no}}">
                        
                        @error('ward_no')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror

                      </div>
                    </div>
                    
                    

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <a href="{{route('ward')}}"
                          style='background: #a7a4a4; border-color: #9a9da0;' class="btn btn-primary">
                          <i class="fas fa-window-close"></i> Cancel</a>
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
</div>
<!-- /.content-wrapper -->

@endsection