@extends('admin_master')
@section('admin_content')
 
 <div class="content-wrapper">
   
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2" style="margin-top: 20px">
          <div class="col-sm-6">
            <h4>বাড়ির ধরণ সেটআপ </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">বাড়ির ধরণ সেটআপ</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <h4 style="display: inline-block">বাড়ির ধরণ সেটআপ</h4>
                <a style="float: right;" href="{{route('house_type.rate')}}" class="btn btn-primary">বাড়ির কর রেট তালিকা</a>
              </div>
                      <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="settings"><br><br>
                    <form class="form-horizontal" action="{{route('store.house_rate')}}" method="post" name="form">
                      @csrf                      
                        <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">House Type<span style="color: red">*</span></label>
                        <div class="col-sm-7">
                          <select id="name" class="form-control @error('house_type_id') is-invalid @enderror" name="house_type_id">
                          	@php
                          	 $house_types = DB::table('house_types')->get();
                          	@endphp
                          	@foreach($house_types as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                           @endforeach
                      </select>
                      @error('house_type_id')
                          <small class="text-danger">
                              <strong>{{ $message }}</strong>
                          </small>
                      @enderror
                        </div>
                      </div>  

                      <div class="form-group row">
                        <label for="tax_rate" class="col-sm-2 col-form-label">Tax Rate<span style="color: red">*</span></label>
                        <div class="col-sm-7">
                          <input type="number" id="tax_rate" class="form-control @error('tax_rate') is-invalid @enderror" name="tax_rate" placeholder="Rate" value="{{ old('tax_rate') }}">
                          @error('tax_rate')
                              <small class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </small>
                          @enderror
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Status<span style="color: red">*</span></label>
                        <div class="col-sm-7">
                          <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                          @error('status')
                              <small class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </small>
                          @enderror
                        </div>
                      </div>            
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">সংরক্ষণ</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <!-- /.content-wrapper -->
  <script>
    document.forms['form'].elements['house_type_id'].value=[{{ old('house_type_id') }}]
    document.forms['form'].elements['status'].value=[{{ old('status') }}]
  </script>

@endsection