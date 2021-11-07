@extends('admin_master')
@section('admin_content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px">
                    <div class="col-sm-6">
                        <h4>সেবা কার্ড একটিভ প্যানেল</h4>
                    </div>

                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                সেবা কার্ড একটিভ প্যানেল
                            </div>

                            <div class="card-body">
                                <table class="table" style="max-width: 500px;">
                                    <tr>
                                        <td>নাম</td>
                                        <td>{{ $user->name ?? $user->owner_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>পিতার নাম</td>
                                        <td>{{ $user->father_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{ $user->nid == '' ? 'জন্ম নিবন্ধন সনদ নং' : 'NID' }}
                                        </td>
                                        <td>
                                            {{ $user->nid == '' ? $user->birth_certificate : $user->nid }}

                                        </td>
                                    </tr>
                                    @if ($type == 1)
                                        <tr>
                                            <td>জন্ম তারিখ</td>
                                            <td>{{ $user->day . '/' . $user->month . '/' . $user->year }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>সর্বশেষ পরিশোধিত অর্থবছর</td>
                                            <td>{{ $user->last_license_issue_year }}</td>
                                        </tr>
                                    @endif



                                    <tr>
                                        <td>ওয়ার্ড নং</td>
                                        <td>{{ $user->ward_id }}</td>
                                    </tr>

                                    @if ($type == 1)
                                        <tr>
                                            <td>হোল্ডিং নং</td>
                                            <td>{{ $user->holding_no }}</td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td>মোবাইল নং</td>
                                        <td>{{ $user->mobile }}</td>
                                    </tr>

                                    <tr>
                                        <td>একশন</td>
                                        <td>
                                            @if ($user->status == 0)
                                                <a href="{{ route('action.activeshow', [$user->id, $type]) }}"
                                                    class="btn btn-primary">একটিভ করুন</a>
                                            @else
                                                <a href="{{ route('action.deactivePanel', [$user->id, $type]) }}"
                                                    class="btn btn-danger">ডিএকটিভ করুন</a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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
