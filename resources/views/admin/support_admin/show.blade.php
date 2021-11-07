@extends('admin_master')
@section('admin_content')

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px;">
                <div class="col-sm-6">
                    <h5>সাপোর্ট এডমিনের তথ্য</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active">সাপোর্ট এডমিনের তথ্য</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card main-chart mt-4">
                        <div class="card-header panel-tabs">
                            <h5>বসতবাড়ি রেজিষ্ট্রেশন
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের নাম :</span> {{ $user->name }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের ইউজার আইডি :</span> {{ $user->user_id }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের মোবাইল নং :</span> {{ $user->contact }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের ইমেইল :</span> {{ $user->email }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span
                                        class="font-weight-bold">ইউজার টাইপ :</span> {{ 'Support Admin'}}
                                </div>

                            </div>
                            <table class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>ক্রমিক নং</th>
                                    <th>তারিখ</th>
                                    <th>মোট রেজিষ্ট্রেশন</th>
                                    <th>বিস্তারিত</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($general as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->total }}</td>
                                        <td>
                                            <a data-toggle="tooltip" title="তথ্যগুলো দেখুন"
                                               href="{{ route('support_admin_gen_view', [$row->date, $user->user_id]) }}"
                                               class="btn btn-primary btn-sm "><i class=" far fa-eye"></i> বিস্তারিত
                                                দেখুন</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card main-chart mt-4">
                        <div class="card-header panel-tabs">
                            <h5>বাণিজ্যিক ইউজার রেজিষ্ট্রেশন
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের নাম :</span> {{ $user->name }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের ইউজার আইডি :</span> {{ $user->user_id }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের মোবাইল নং :</span> {{ $user->contact }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">এডমিনের ইমেইল :</span> {{ $user->email }}
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <span class="font-weight-bold">ইউজার টাইপ :</span> {{ 'Support Admin' }}
                                </div>

                            </div>


                            <table class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>ক্রমিক নং</th>
                                    <th>তারিখ</th>
                                    <th>মোট রেজিষ্ট্রেশন</th>
                                    <th>বিস্তারিত</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($business as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->total }}</td>
                                        <td>
                                            <a data-toggle="tooltip" title="তথ্যগুলো দেখুন"
                                               href="{{ route('support_admin_business_view', [$row->date, $user->user_id]) }}"
                                               class="btn btn-primary btn-sm "><i class=" far fa-eye"></i> বিস্তারিত
                                                দেখুন</a>
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
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.quick_update', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#quick_view').modal('show');

                $.ajax({
                    url: "{{ url('/get-business_hold_info/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function (data) {

                        $("#quick_view .modal-body").html(data);
                    },

                });
            });

            $(document).on('click', '.close_modal', function (e) {
                e.preventDefault();
                $('.modal').modal('hide');
            });


            $(document).on('click', '.info-update', function (e) {
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
                    success: function (data) {
                        window.location.reload();
                        toastr.success("Successfully Informaton Updated");
                    },

                });

            });


            //Quick View
            $(document).on("click", ".quick-view", function (e) {
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
                    success: function (data) {
                        $("#quick-view-modal .modal-body").html(data);
                    },

                });
            });
            //Quick View
            $("#pending_user").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                window.location.href = "/inactive-business_hold/" + id;
            });

            $("#active_user").click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                window.location.href = "/active-business_hold/" + id;
            });


        });
    </script>
@endsection
