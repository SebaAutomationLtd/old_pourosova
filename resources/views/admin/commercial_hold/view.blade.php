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
                        <table class="table table-bordered">
                            <tr>
                                <td><span style="margin-left: 50px;">হোল্ডিং ধরন  :</span></td>
                                <td><span style="margin-left: 50px;">{{$all->hold_type}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">নাম  :</span></td>
                                <td><span style="margin-left: 50px;">{{$all->owner_name}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    @if($all->father_name !=null)
                                    <span style="margin-left: 50px;">পিতার নাম :</span>
                                    @endif
                                    @if($all->husband_name !=null)
                                    <span style="margin-left: 50px;">স্বামীর নাম :</span>
                                    @endif
                                </td>
                                <td><span style="margin-left: 50px;">{{ $all->father_name == null ? $all->husband_name : $all->father_name }}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">জন্ম তারিখ:</span></td>
                                <td><span style="margin-left: 50px;">{{$all->dob}}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    @if($all->nid !=null)
                                    <span style="margin-left: 50px;">এনআইডি নম্বর :</span>
                                    @endif
                                    @if($all->birth_certificate !=null)
                                    <span style="margin-left: 50px;">জন্ম নিবন্ধন নম্বর :</span>
                                    @endif
                                </td>
                                <td><span style="margin-left: 50px;">{{ $all->nid == null ? $all->birth_certificate : $all->nid }}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">মোবাইল:</span></td>
                                <td><span style="margin-left: 50px;">{{$all->mobile}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">ওয়ার্ড নং:</span></td>
                                <td><span style="margin-left: 50px;">{{$all->ward_no}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">হোল্ডিং নং :</span></td>
                                <td><span style="margin-left: 50px;">{{$all->holding_no}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">বাড়ির ধরণ :</span></td>
                                <td><span style="margin-left: 50px;">{{$all->name}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">রুম পরিমাণ :</span></td>
                                <td><span style="margin-left: 50px;">{{$all->number_room}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">দৈর্ঘ (ফুট) :</span></td>
                                <td><span style="margin-left: 50px;">{{$all->length_number}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">প্রস্থ (ফুট) :</span></td>
                                <td><span style="margin-left: 50px;">{{$all->width_number}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">বাৎসরিক মূল্যায়ন মান:</span></td>
                                <td><span style="margin-left: 50px;">{{$all->house_year_value}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">বার্ষিক কর:</span></td>
                                <td><span style="margin-left: 50px;">{{$all->yearly_vat}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">সর্বশেষ ট্যাক্স পরিশোধ অর্থবছর:</span></td>
                                <td><span style="margin-left: 50px;">{{$all->last_tax_year}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">নিবন্ধন চার্জ (টাকা):</span></td>
                                <td><span style="margin-left: 50px;">{{$all->service_charge}}</span></td>
                            </tr>
                            <tr>
                                <td><span style="margin-left: 50px;">পেমেন্ট প্রকার:</span></td>
                                <td><span style="margin-left: 50px;">{{$all->payment_type}}</span></td>
                            </tr>
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
