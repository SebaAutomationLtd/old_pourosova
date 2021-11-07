@extends('admin_master')
@section('admin_content')


<div class="content-wrapper"> 

    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2" style="margin-top: 20px">
          <div class="col-sm-6">
            <h4>ব্যবসায়ের ধরণ আপডেট করুন</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">হোম</a></li>
              <li class="breadcrumb-item active">ব্যবসায়ের ধরণ আপডেট করুন</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
               <h4>ব্যবসায়ের ধরণ আপডেট</h4>
              </div>
              <div class="container col-lg-4">

      
</div>              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings"><br><br>
                      <form class="form-horizontal" action="{{route('update.business_type',$edit->id)}}" method="post">
                      	@csrf
                       <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">প্রাতিষ্ঠানিক নাম<span style="color: red">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="প্রাতিষ্ঠানিক নাম" value="{{$edit->name}}">
                          @error('name')
                              <small class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </small>
                          @enderror
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">শুরু মূলধন রেঞ্জ </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control @error('start_capital_range') is-invalid @enderror" name="start_capital_range" placeholder="2000" value="{{$edit->start_capital_range}}">
                          
                        @error('start_capital_range')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">লাস্ট মূলধন রেঞ্জ </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control @error('last_capital_range') is-invalid @enderror" name="last_capital_range" placeholder="3000" value="{{$edit->last_capital_range}}">
                          @error('last_capital_range')
                              <small class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </small>
                          @enderror
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">সংরক্ষণ</button>
                          <a href="{{route('business.type')}}"
                           style='background: #a7a4a4; border-color: #9a9da0;'
                            class="btn btn-primary">
                            <i class="fas fa-window-close"></i> বাতিল
                          </a>
                        </div>
                      </div>
                    </form><br><br>
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