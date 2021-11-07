@extends('admin_master')

@section('top-header')
    <section class="content-header pl-3">
        <h1>প্রোফাইল আপডেট</h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> প্রোফাইল
            </li>
            <li> আপডেট</li>
        </ol>
    </section>
@endsection

@section('admin_content')
    <div class="card">
        <div class="card-header">
            পাসওয়ার্ড আপডেট
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('password_change.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">পুরাতন পাসওয়ার্ড</label>
                            <input type="password" name="old_password" class="form-control">
                            @error('old_password')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                            <div>
                                <small class="text-danger">
                                    <strong>{{ session()->get('errmsg') }} </strong>
                                </small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">নতুন পাসওয়ার্ড</label>
                            <input type="password" name="new_password" class="form-control">
                            @error('new_password')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">পূণরায় নতুন পাসওয়ার্ড</label>
                            <input type="password" name="new_password_again" class="form-control">
                            @error('new_password_again')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-block">আপডেট</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
