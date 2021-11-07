@extends('admin_master')
@section('admin_content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px">

                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header ">
                                <h4>একটিভ / ডিএকটিভ প্যানেল</h4>
                            </div><!-- /.card-header -->
                            <div class="container col-lg-4">

                            </div>
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="active tab-pane" id="settings"><br><br>
                                        <form action="{{ route('action.search') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">ধরণ
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <select required class="form-control" name="type" id="">
                                                        <option value="">--Select--</option>
                                                        <option value="1">বসতবাড়ি</option>
                                                        <option value="2">বাণিজ্যিক</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="storeId" class="col-sm-2 col-form-label">ওয়ার্ড
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <select required class="form-control" name="ward_id" required>
                                                        <option value="">ওয়ার্ড নির্বাচন করুন</option>
                                                        @php
                                                            $wards = DB::table('wards')
                                                                ->orderBy('id', 'ASC')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($wards as $row)
                                                            <option value="{{ $row->id }}">{{ $row->ward_no }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">NID / জন্ম নিবন্ধন /
                                                    ফোন
                                                    নম্বর
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <input required type="text" name="contact" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">খুজুন</button>
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
