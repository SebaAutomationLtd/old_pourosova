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
                                @if (count($users) == 0)
                                    কোন তথ্য খুজে পাওয়া যায়নি
                                @else
                                    @foreach ($users as $user)
                                        <table class="table table-hover table-bordered">
                                            <tr>
                                                <th>নাম</th>
                                                <th>ইউজার আইডি</th>
                                                <th>ওয়ার্ড</th>
                                                <th>স্টাটাস</th>
                                                <th>একশন</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $user->name ?? $user->owner_name }}</td>
                                                <td>{{ $user->user_id }}</td>
                                                <td>{{ $user->ward_id }}</td>
                                                <td>{{ $user->status == 1 ? 'Active' : 'Pending' }}</td>
                                                <td>
                                                    <a href="{{ route('action.show', [$user->id, $type]) }}"
                                                        class="btn btn-primary">বিস্তারিত দেখুন</a>

                                                </td>
                                            </tr>
                                        </table>
                                    @endforeach
                                @endif
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
