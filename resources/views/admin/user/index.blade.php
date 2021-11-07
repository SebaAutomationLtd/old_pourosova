@extends('admin_master')
@section('admin_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px;">
                <div class="col-sm-6">
                    <h5>ইউজার তালিকা</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active">ইউজার তালিকা</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card main-chart mt-4">
                        <div class="card-header panel-tabs">
                            <h4 style="display: inline-block">ইউজার তালিকা তালিকা টেবিল</h4>
                            <a href="{{ route('user.create') }}" class="btn btn-primary" style="float: right">
                                <i class="fas fa-store-alt"></i> নতুন ইউজার তৈরি করুন
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="table-data">
                                    <table
                                        class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>সিরিয়াল</th>
                                                <th>ছবি</th>
                                                <th>ইউজার আইডি</th>
                                                <th>ইউজার রোল</th>
                                                <th>ইউজার নাম</th>
                                                <th>মোবাইল</th>
                                                <th>একশন</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key => $row)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('Admin/img/user_photo/' . $row->photo) }}"
                                                            width="100" alt="">
                                                    </td>
                                                    <td>{{ $row->user_id }}</td>
                                                    <td>{{ $row->role_old }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->contact }}</td>
                                                    <td>
                                                        <a href="{{ route('user.edit', $row->id) }}"
                                                            class="btn btn-info btn-sm btn-sm"
                                                            style="float: left;margin-right: 3px;">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="{{ route('user.delete', $row->id) }}" id="delete"
                                                            class="btn btn-danger btn-sm btn-sm"><i
                                                                class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
