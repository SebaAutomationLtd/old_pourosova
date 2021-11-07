@extends('admin_master')
@section('admin_content')

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px;">
                <div class="col-sm-6">
                    <h5>বানিজ্যিক হোল্ডিং নিবন্ধন পরিচালনা করুন</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">হোম</a></li>
                        <li class="breadcrumb-item active"> বানিজ্যিক হোল্ডিং নিবন্ধন পরিচালনা করুন</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card main-chart mt-4">
                        <div class="card-header panel-tabs">
                            <h5>বানিজ্যিক হোল্ডিং নিবন্ধন টেবিল <a href="" class="btn btn-primary float-right"><i
                                        class="fas fa-download"></i> Download</a>
                            </h5>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <form action="{{ route('all_business_hold_filter') }}" method="get">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-5 col-md-7 col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <select style="border-radius: .25rem 0 0 .25rem;" name="ward" id=""
                                                            class="form-control form-control-sm">
                                                        <option value="" selected disabled>ওয়ার্ড</option>
                                                        @foreach ($wards as $ward)
                                                            <option>{{ $ward->ward_no }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <input class="form-control form-control-sm" type="text" name="mobile"
                                                       placeholder="NID/ মোবাইল নং" aria-label="Recipient's ">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success btn-sm"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>


                            <div class="row mb-2">

                                <div class="col-md-2 font-weight-bold text-primary col-sm-4">মোট ইউজার
                                    : {{ count($all) }}
                                </div>

                            </div>


                            <div class="">
                                <div class="table-data">
                                    <table
                                        class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                        style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>ক্রমিক নং</th>
                                            <th>নাম</th>
                                            <th>পিতা/স্বামীর নাম</th>
                                            <th>মোবাইল নং</th>
                                            <th>NID/জন্ম সনদ নং</th>
                                            <th>ইউজার আইডি</th>
                                            <th>ধরণ</th>
                                            <th>একশন</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($all as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->father_name == null ? $row->husband_name : $row->father_name }}
                                                </td>
                                                <td>{{ $row->mobile }}</td>
                                                <td>{{ $row->nid == null ? $row->birth_certificate : $row->nid }}</td>
                                                <td>{{ $row->user_id }}</td>
                                                <td>{!! $row->status == 0 ? '<span class="badge badge-danger">পেন্ডিং</span>' : '<span class="badge badge-success">একটিভ</span>' !!}</td>
                                                <td>
                                                {{--                                                        @if ($row->status == 0)--}}
                                                {{--                                                            <a data-toggle="tooltip" title="একটিভ করুন"--}}
                                                {{--                                                                href="{{ route('active.business_hold', $row->id) }}"--}}
                                                {{--                                                                class="btn btn-success btn-sm"><i--}}
                                                {{--                                                                    class="far fa-check-circle"></i></a>--}}
                                                {{--                                                        @else--}}
                                                {{--                                                            <a data-toggle="tooltip" title="পেন্ডিং করুন"--}}
                                                {{--                                                                href="{{ route('inactive.business_hold', $row->id) }}"--}}
                                                {{--                                                                class="btn btn-warning btn-sm"><i--}}
                                                {{--                                                                    class="far fa-times-circle"></i></a>--}}
                                                {{--                                                        @endif--}}
                                                <!--<a data-toggle="tooltip" title="তথ্যগুলো দেখুন" href="#"-->
                                                    <!--    class="btn btn-secondary btn-sm quick-view"-->
                                                <!--    data-id="{{ $row->id }}"-->
                                                <!--    data-status="{{ $row->status }}"><i-->
                                                    <!--        class="far fa-eye"></i></a>-->
                                                    @if (Request::is('all-business_hold'))
                                                        <a data-placement="left" title="Quick Update" data="tooltip"
                                                           class="btn btn-info btn-sm quick_update" href="#"
                                                           data-id="{{ $row->id }}"><i
                                                                class="fas fa-tools"></i></a>
                                                        <a data-toggle="tooltip" title="এডিট করুন"
                                                           href="{{ route('edit.business_hold', $row->id) }}"
                                                           class="btn btn-primary btn-sm"><i
                                                                class="far fa-edit"></i></a>
                                                        <a data-toggle="tooltip" title="ডিলেট করুন" id="delete"
                                                           href="{{ route('delete.business_hold', $row->id) }}"
                                                           class="btn btn-danger btn-sm"><i
                                                                class="far fa-trash-alt"></i></a>
                                                    @endif

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



    <!-- Modal -->
    <div class="modal" tabindex="-1" id="quick_view">
        <div class="modal-dialog">
            <div class="modal-content">
                <h5 style="padding: 10px;">Business Holder Summary</h5>
                <hr>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Quick View Modal -->
    <div class="modal fade" id="quick-view-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="quick-view-modal">ইউজারের বিস্তারিত তথ্য</h5>

                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <a data-toggle="tooltip" data-id="" id="active_user" title="একটিভ করুন" href="#"
                       class="btn btn-primary">একটিভ করুন</a>
                    <a data-toggle="tooltip" data-id="" id="pending_user" title="পেন্ডিং করুন" href="#"
                       class="btn btn-warning">পেন্ডিং করুন</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal End-->

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
