@extends('admin_master')
@section('admin_content')

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px;">
                <div class="col-sm-6">
                    <h5>সাপোর্ট এডমিন নিবন্ধন করুন</h5>
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
                            <h5>বানিজ্যিক হোল্ডিং নিবন্ধন টেবিল <a href="{{ route('supportAdmin.create') }}"
                                    class="btn btn-primary float-right"><i class="fas fa-download"></i> Add New</a>
                            </h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('supportAdmin.create') }}" method="post">
                                @csrf

                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="">Full Name</label>
                                            <input name="name" type="text" class="form-control">
                                        </div>

                                        <div class="form-group ">
                                            <label for="">Email Address</label>
                                            <input name="email" type="email" class="form-control">
                                        </div>

                                        <div class="form-group ">
                                            <label for="">Contact Number</label>
                                            <input name="contact" type="tel" class="form-control">
                                        </div>

                                        <div class="form-group ">
                                            <label for="">Password</label>
                                            <input name="password" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>

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
        $(document).ready(function() {
            $(document).on('click', '.quick_update', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#quick_view').modal('show');

                $.ajax({
                    url: "{{ url('/get-business_hold_info/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function(data) {

                        $("#quick_view .modal-body").html(data);
                    },

                });
            });

            $(document).on('click', '.close_modal', function(e) {
                e.preventDefault();
                $('.modal').modal('hide');
            });


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
