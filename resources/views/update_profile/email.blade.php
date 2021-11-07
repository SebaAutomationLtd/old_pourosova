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
            ইমেইল আপডেট
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('email_change.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">পুরাতন ইমেইল</label>
                            <input type="email" name="old_email" class="form-control">
                            @error('old_email')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                            <div>
                                <small class="text-danger">
                                    <strong>{{ session()->get('erroldmail') }} </strong>
                                </small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">নতুন ইমেইল</label>
                            <input type="email" name="new_email" class="form-control">
                            @error('new_email')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">পূণরায় নতুন ইমেইল</label>
                            <input type="email" name="new_email_again" class="form-control">
                            @error('new_email_again')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">পাসওয়ার্ড</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                            <div>
                                <small class="text-danger">
                                    <strong>{{ session()->get('erroldpass') }} </strong>
                                </small>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block">আপডেট</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
