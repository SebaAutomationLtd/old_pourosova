@extends('admin_master')
@section('admin_content')

<div class="content-wrapper"> 
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2" style="margin-top: 20px">
          <div class="col-sm-6">
            <h4> পেশা আপডেট </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">পেশা আপডেট </li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title" style="display: inline-block">আপডেট পেশা</h4>
                 <a href="{{route('occupation')}}" class="btn btn-primary float-right" style="float: right">
                          <i class="fas fa-store-alt"></i> পেশা তালিকা
                  </a>
              </div>
              <form id="quickForm" method="post" action="{{route('update.occupation',$data->id)}}">
                @csrf               
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">পেশা নাম<span style="color: red">*</span></label>
                        <div class="col-sm-7">
                          <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{$data->name}}">
                          
                          @error('name')
                              <small class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </small>
                          @enderror
                        </div>
                      </div>  

                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">স্টেটাস<span style="color: red">*</span></label>
                        <div class="col-sm-7">
                          <select name="status" id="" class="form-control" required="">
                              <option value="1" <?php if($data->status == '1'){echo "selected";} ?>>Active</option>
                              <option value="0" <?php if($data->status == '0'){echo "selected";} ?>>Inactive</option>
                          </select>
                        </div>
                      </div> 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">আপডেট</button>
                </div>
              </form>
            </div>
            </div>

        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

@endsection