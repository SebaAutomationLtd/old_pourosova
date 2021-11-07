@extends('admin_master')
@section('admin_content')

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px;">
                    <div class="col-sm-6">
                        <h5>বসতবাড়ী হোল্ডিং নিবন্ধন পরিচালনা করুন </h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">হোম</a></li>
                            <li class="breadcrumb-item active"> বসতবাড়ী হোল্ডিং নিবন্ধন পরিচালনা করুন</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> বসতবাড়ী হোল্ডিং নিবন্ধন <a href=""
                                            class="btn btn-primary float-right"><i class="fas fa-download"></i> Download</a>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <form action="{{ route('general_member_filter') }}" method="get">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-5 col-md-7 col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <select style="width: 75px;" id="ward"
                                                                style="border-radius: .25rem 0 0 .25rem;" name="ward"
                                                                class="form-control form-control-sm">
                                                                <option value="" disabled selected>ওয়ার্ড
                                                                </option>
                                                                @foreach ($wards as $ward)
                                                                    <option>{{ $ward->ward_no }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <select style="width: 75px;" style="border-radius: 0;"
                                                                name="village" id="village"
                                                                class="form-control form-control-sm">
                                                                <option value="" selected="" disabled="">গ্রাম
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="holding_no" placeholder="হোল্ডিং নং/NID/মোবাইল"
                                                            aria-label="Recipient's ">
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

                                        <div class="col-md-2 font-weight-bold text-primary col-sm-4">মোট ইউজার :
                                            {{ count($all) }}</div>
                                    </div>

                                    <table
                                        class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ক্রমিক নং</th>
                                                <th>নাম</th>
                                                <th>পিতা/স্বামীর নাম</th>
                                                <th>মোবাইল নং</th>
                                                <th>ইউজার আইডি</th>
                                                <th>ধরণ</th>
                                                <th>তারিখ</th>
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
                                                    <td>{{ $row->user_id }}</td>
                                                    <td>{!! $row->status == 0 ? '<span class="badge badge-danger">পেন্ডিং</span>' : '<span class="badge badge-success">একটিভ</span>' !!}</td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <td>
                                                        @if ($row->status == 0)
                                                            <a data-toggle="tooltip" title="একটিভ করুন"
                                                                href="{{ route('active.general_member', $row->id) }}"
                                                                class="btn btn-success btn-sm"><i
                                                                    class="far fa-check-circle"></i></a>
                                                        @else
                                                            <a data-toggle="tooltip" title="পেন্ডিং করুন"
                                                                href="{{ route('inactive.general_member', $row->id) }}"
                                                                class="btn btn-warning btn-sm"><i
                                                                    class="far fa-times-circle"></i></a>
                                                        @endif
                                                        <!--<a data-toggle="tooltip" title="তথ্যগুলো দেখুন" href="#"-->
                                                        <!--    class="btn btn-secondary btn-sm quick-view"-->
                                                        <!--    data-id="{{ $row->id }}"-->
                                                        <!--    data-status="{{ $row->status }}"><i-->
                                                        <!--        class="far fa-eye"></i></a>-->
                                                        @if (Request::is('general-member'))

                                                            <a data-toggle="tooltip" title="কুইক এডিট" href="#"
                                                                class="btn btn-info btn-sm quick-edit"
                                                                data-id="{{ $row->id }}"><i
                                                                    class="fas fa-tools"></i></a>
                                                            <a data-toggle="tooltip" title="এডিট করুন"
                                                                href="{{ route('edit.general_member', $row->id) }}"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="far fa-edit"></i></a>
                                                            <a data-toggle="tooltip" title="ডিলেট করুন" id="delete"
                                                                href="{{ route('delete.general_member', $row->id) }}"
                                                                class="btn btn-danger btn-sm"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>




        <!-- Quick Edit Modal -->
        <div class="modal fade" id="quick-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="quick-edit-modal">কুইক এডিট করুন</h5>

                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn info-update btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick Edit Modal End -->

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




        <!-- /.content-wrapper -->
        <script src="{{ asset('new_dash') }}/js/jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                //Quick Edit
                $(document).on("click", ".quick-edit", function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $(".member_id").val(id);
                    $('#quick-edit-modal').modal('show');

                    $.ajax({
                        url: "{{ url('/get-info/') }}/" + id,
                        type: "GET",
                        dataType: "html",
                        success: function(data) {
                            $("#quick-edit-modal .modal-body").html(data);
                        },

                    });
                });
                //Quick Edit





                $(document).on('click', '.info-update', function(e) {
                    e.preventDefault();
                    var name = $('.name').val();
                    var user_id = $('.user_id').val();
                    var password = $('.password').val();
                    var member_id = $('.member_id').val();


                    $.ajax({
                        url: "{{ url('/update-member_info') }}",
                        type: "GET",
                        data: {
                            'name': name,
                            'user_id': user_id,
                            'password': password,
                            'member_id': member_id
                        },
                        dataType: "html",
                        success: function(data) {
                            console.log(data);
                            //  window.location.reload();
                            toastr.success("Successfully Informaton Updated");
                        },
                    });
                });


                //Quick View
                $(document).on("click", ".quick-view", function(e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    var status = $(this).attr('data-status');

                    $('#quick-view-modal').modal('show');
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
                        url: "{{ url('/general-member-quick-view/') }}/" + id,
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
                    window.location.href = "/inactive-general_member/" + id;
                });

                $("#active_user").click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr('data-id');
                    window.location.href = "/active-general_member/" + id;
                });





                $(document).on('change', '#ward', function() {
                    var id = $('#ward').val();
                    $.ajax({
                        url: "{{ url('/get-village/') }}/" + id,
                        type: "GET",
                        dataType: "html",
                        success: function(data) {
                            if (data == 'no_data') {
                                toastr.error("Sorry, No Data Found");
                                $("#village").html(
                                    '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                                );
                            } else {
                                $("#village").html(data);
                            }
                        },
                    });
                });


            });
        </script>
    @endsection
