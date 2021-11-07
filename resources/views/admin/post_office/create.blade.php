@extends('admin_master')
@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2" style="margin-top: 20px">
          <div class="col-sm-6">
            <h4>ডাকঘর</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">ডাকঘর</li>
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
                    <form class="form-horizontal" action="{{route('store.post_office')}}" method="post" class="needs-validation">
                    @csrf  
                  
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">পোস্ট কোড<span style="color: red">*</span></label>
                        <div class="col-sm-8">
                            <select name="post_code_id" id="" class="form-control @error('post_code_id') is-invalid @enderror">
                                <option value="" selected disabled>--নির্বাচন করুন ---</option>
                                @php
                                 $post_codes = DB::table('post_codes')->orderBy('id', 'DESC')->get();
                                @endphp
                                @foreach($post_codes as $row)
                                <option value="{{$row->id}}">{{$row->post_code}}</option>
                                @endforeach
                                                                
                            </select>

                            @error('post_code_id')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                         <div class="invalid-feedback">অনুগ্রহ করে এই ঘরটি পুরন কর.</div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">ডাকঘর<span style="color: red">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control @error('post_office') is-invalid @enderror" name="post_office" placeholder="ডাকঘর" value="{{ old('post_office') }}" >

                          @error('post_office')
                              <small class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </small>
                          @enderror

                        </div>
                         
                      </div>                    
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{ route('post.office') }}" style='background: #a7a4a4; border-color: #9a9da0;' class="btn btn-primary"><i class="fas fa-window-close"></i> বাতিল</a>
                          <button type="submit" class="btn btn-success">সংরক্ষণ</button>
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

@endsection