@extends('admin_master')
@section('admin_content')

<div class="content-wrapper"> 
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2" style="margin-top: 20px">
          <div class="col-sm-6">
            <h4> পেশা সেটআপ </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">পেশা সেটআপ </li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title" style="display: inline-block">নতুন পেশা</h4>
                 <a href="{{route('occupation')}}" class="btn btn-primary float-right" style="float: right">
                          <i class="fas fa-store-alt"></i> পেশা তালিকা
                  </a>
              </div>
              <form id="quickForm" method="post" action="{{route('store.occupation')}}" enctype="multipart/form-data">
                @csrf               
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">পেশা নাম </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="পেশা নাম ">
                    @error('name')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">সংরক্ষণ</button>
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