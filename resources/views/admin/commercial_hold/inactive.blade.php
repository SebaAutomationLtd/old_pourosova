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
                            <h5>বানিজ্যিক হোল্ডিং নিবন্ধন টেবিল <a href="{{URL::to('inactiveexportpdfcomdata')}}"
                                                                    class="btn btn-primary float-right"><i
                                        class="fas fa-download"></i> Download</a>
                            </h5>
                        </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <form action="{{ URL::to('commercial-hold-filter') }}" method="get">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-7 col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <select style="border-radius: .25rem 0 0 .25rem;" name="wardid"
                                                            id=""
                                                            class="form-control form-control-sm">
                                                        <option value="" selected disabled>ওয়ার্ড</option>
                                                        @foreach ($wards as $ward)
                                                            <option
                                                                value="{{ $ward->id }}">{{ $ward->ward_no }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <input class="form-control form-control-sm" type="text" name="nid"
                                                       placeholder="NID" aria-label="Recipient's ">
                                                <input class="form-control form-control-sm" type="text" name="mobile"
                                                       placeholder="মোবাইল নং" aria-label="Recipient's ">
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
                                                <td>{{ $row->owner_name }}</td>
                                                <td>{{ $row->father_name == null ? $row->husband_name : $row->father_name }}
                                                </td>
                                                <td>{{ $row->mobile }}</td>
                                                <td>{{ $row->nid == null ? $row->birth_certificate : $row->nid }}</td>
                                                <td>{{ $row->user_id }}</td>
                                                <td>{!! $row->status == 0 ? '<span class="badge badge-danger">পেন্ডিং</span>' : '<span class="badge badge-success">একটিভ</span>' !!}</td>
                                                <td>
                                                {{--                                                @if ($row->status == 0)--}}
                                                {{--                                                <a data-toggle="tooltip" title="একটিভ করুন"--}}
                                                {{--                                                   href="{{ route('active.commercial_hold', $row->id) }}"--}}
                                                {{--                                                   class="btn btn-success btn-sm"><i--}}
                                                {{--                                                        class="far fa-check-circle"></i></a>--}}
                                                {{--                                                @else--}}
                                                {{--                                                <a data-toggle="tooltip" title="পেন্ডিং করুন"--}}
                                                {{--                                                   href="{{ route('inactive.commercial_hold', $row->id) }}"--}}
                                                {{--                                                   class="btn btn-warning btn-sm"><i--}}
                                                {{--                                                        class="far fa-times-circle"></i></a>--}}
                                                {{--                                                @endif--}}
                                                <!--<a data-toggle="tooltip" title="তথ্যগুলো দেখুন" href="#"-->
                                                    <!--    class="btn btn-secondary btn-sm quick-view"-->
                                                <!--    data-id="{{ $row->id }}"-->
                                                <!--    data-status="{{ $row->status }}"><i-->
                                                    <!--        class="far fa-eye"></i></a>-->
                                                    <a data-toggle="tooltip" title="ভিউ করুন"
                                                       href="{{ route('view.commercial_hold', $row->id) }}"
                                                       class="btn btn-info btn-sm"><i
                                                            class="far fa-eye"></i></a>

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
