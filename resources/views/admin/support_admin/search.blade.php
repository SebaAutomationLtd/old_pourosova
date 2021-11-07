@extends('admin_master')
@section('admin_content')

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px;">
                <div class="col-sm-6">
                    <h5>সাপোর্ট এডমিনের তালিকা</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active"> সাপোর্ট এডমিন</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card main-chart mt-4">
                        <div class="card-header panel-tabs">
                            <h5>সাপোর্ট এডমিনের রিপোর্ট ({{ date('Y-M-d') }}) <a
                                    href="{{ route('supportAdmin.create') }}" class="btn btn-primary float-right"><i
                                        class="fas fa-download"></i> Add New</a>
                            </h5>
                        </div>
                        <div class="card-body">

                            <div class="search">
                                <form method="get" action="{{ route('supportAdmin.filter') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="">ওয়ার্ড</label>
                                            <select name="ward" id="" class="form-control">
                                                <option value="">ওয়ার্ড</option>
                                                @foreach ($wards as $ward)
                                                    <option>{{ $ward->ward_no }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="">ইউজার</label>
                                            <select name="user" id="" class="form-control">
                                                <option value="">ইউজার</option>
                                                @foreach ($users_search as $user)
                                                    <option value="{{ $user->user_id }}">
                                                        {{ $user->name }} ({{ $user->contact }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="">শুরুর তারিখ</label>
                                            <input name="from" type="date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2 col-sm-3 col-6">
                                            <label for="">শেষ তারিখ</label>
                                            <input name="to" type="date" class="form-control">
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-6">
                                            <label for="" style="color: rgba(0,0,0,0);">saf</label> <br>
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="___class_+?27___">
                                <div class="table-data">
                                    <table
                                        class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ক্রমিক নং</th>
                                                <th>নাম {{ $from_s }}</th>
                                                <th>ইউজার আইডি</th>
                                                <th>মোবাইল নং</th>
                                                <th>তারিখ</th>
                                                <th>বসতবাড়ি</th>
                                                <th>বাণিজ্যিক</th>
                                                <th>একশন</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->user_id }}</td>
                                                    <td>{{ $row->contact }}</td>
                                                    <td>
                                                        @if ($from_s == '')
                                                            {{ date('Y-m-d') }}
                                                        @else
                                                            {{ $from_s . ' to ' . $to_s }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            if ($ward_s == '' && $from_s == '') {
                                                                $query = 'select * from business_holds where added_by="' . $row->user_id . '"';
                                                                $business = DB::select($query);
                                                                $query = 'select * from general_members where added_by="' . $row->user_id . '"';
                                                                $general = DB::select($query);
                                                            } elseif ($ward_s == '' && $from_s != '') {
                                                                $query = 'select * from business_holds where added_by="' . $row->user_id . '" and date(created_at) between "' . $from_s . '" and "' . $to_s . '"';
                                                                $business = DB::select($query);
                                                                $query = 'select * from general_members where added_by="' . $row->user_id . '" and date(created_at) between "' . $from_s . '" and "' . $to_s . '"';
                                                                $general = DB::select($query);
                                                            } elseif ($ward_s != '' && $from_s == '') {
                                                                $query = 'select * from business_holds where added_by="' . $row->user_id . '" and ward_id="' . $ward_s . '"';
                                                                $business = DB::select($query);
                                                                $query = 'select * from general_members where added_by="' . $row->user_id . '" and ward_id="' . $ward_s . '"';
                                                                $general = DB::select($query);
                                                            } elseif ($ward_s !== '' && $from_s != '') {
                                                                $query = 'select * from business_holds where added_by="' . $row->user_id . '" and ward_id="' . $ward_s . '" and date(created_at) between "' . $from_s . '" and "' . $to_s . '"';
                                                                $business = DB::select($query);
                                                                $query = 'select * from general_members where added_by="' . $row->user_id . '" and ward_id="' . $ward_s . '" and date(created_at) between "' . $from_s . '" and "' . $to_s . '"';
                                                                $general = DB::select($query);
                                                            }
                                                            
                                                        @endphp
                                                        {{ count($general) }}
                                                    </td>
                                                    <td>
                                                        {{ count($business) }}
                                                    </td>
                                                    <td>
                                                        <a data-toggle="tooltip" title="তথ্যগুলো দেখুন"
                                                            href="{{ route('supportAdmin.show', $row->user_id) }}"
                                                            class="btn btn-secondary btn-sm "><i
                                                                class=" far fa-eye"></i></a>

                                                        <a data-toggle="tooltip" title="এডিট করুন"
                                                            href="{{ route('supportAdmin.edit', $row->id) }}"
                                                            class="btn btn-primary btn-sm"><i
                                                                class="far fa-edit"></i></a>

                                                        <a data-toggle="tooltip" title="ডিলেট করুন" id="delete"
                                                            href="{{ route('supportAdmin.destroy', $row->id) }}"
                                                            class="btn btn-danger btn-sm"><i
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





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {




            $(document).on('click', '.info-update', function(e) {
                e.preventDefault();

                var name = $('.name').val();
                var user_id = $('.user_id').val();
                var password = $('.password').val();
                var member_id = $('.member_id').val();
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ url('/update-business_member_info') }}",
                    type: "GET",
                    data: {
                        'name': name,
                        'user_id': user_id,
                        'password': password,
                        'member_id': member_id,
                        'id': id
                    },
                    dataType: "html",
                    success: function(data) {
                        window.location.reload();
                        toastr.success("Successfully Informaton Updated");
                    },

                });

            });



            //Quick View
            $(document).on("click", ".quick-view", function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log("Test : " + id);
                $('#quick-view-modal').modal('show');
                var status = $(this).attr('data-status');

                $("#pending_user").attr('data-id', id);
                $("#active_user").attr('data-id', id);

                if (status == 0) {
                    $("#pending_user").css('display', 'none');
                    $("#active_user").css('display', 'inline-block');

                } else {
                    $("#active_user").css('display', 'none');
                    $("#pending_user").css('display', 'inline-block');
                }
                $.ajax({
                    url: "{{ url('/all-business_hold_quick_view/') }}/" + id,
                    type: "GET",
                    dataType: "html",
                    success: function(data) {
                        $("#quick-view-modal .modal-body").html(data);
                    },

                });
            });
            //Quick View
            $("#pending_user").click(function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                window.location.href = "/inactive-business_hold/" + id;
            });

            $("#active_user").click(function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                window.location.href = "/active-business_hold/" + id;
            });


        });
    </script>
@endsection
