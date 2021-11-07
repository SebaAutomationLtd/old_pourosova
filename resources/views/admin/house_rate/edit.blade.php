@extends('admin_master')
@section('admin_content')
 
 <div class="content-wrapper">
   
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2" style="margin-top: 20px">
          <div class="col-sm-6">
            <h4>বাড়ির কর রেট আপডেট করুন </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">বাড়ির কর রেট আপডেট করুন</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <h4 style="display: inline-block">বাড়ির কর রেট আপডেট</h4>
                <a style="float: right;" href="{{route('house_type.rate')}}" class="btn btn-primary">বাড়ির কর রেট তালিকা</a>
              </div>
                 <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="settings"><br><br>
                    <form class="form-horizontal" action="{{route('update.house_rate',$edit->id)}}" method="post">
                      @csrf                      
                        <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">House Type<span style="color: red">*</span></label>
                        <div class="col-sm-7">
                          <select id="name" class="form-control @error('house_type_id') is-invalid @enderror" name="house_type_id">
                          	@php
                          	 $house_types = DB::table('house_types')->get();
                          	@endphp
                          	@foreach($house_types as $row)
                            <option value="{{$row->id}}" <?php if($row->id == $edit->house_type_id){echo "selected";} ?>>{{$row->name}}</option>
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
                          <input type="number" id="tax_rate" class="form-control @error('tax_rate') is-invalid @enderror" name="tax_rate" value="{{$edit->tax_rate}}">
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
                              <option value="1" <?php if($edit->status == '1'){echo "selected";} ?>>Active</option>
                              <option value="0" <?php if($edit->status == '0'){echo "selected";} ?>>Inactive</option>
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
                          <button type="submit" class="btn btn-success">আপডেট</button>
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


@endsection