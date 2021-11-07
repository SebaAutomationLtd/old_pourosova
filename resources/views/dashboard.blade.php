@extends('admin_master')
@section('admin_content')
@section('top-header')
    <section class="content-header pl-3">
        <h1>ড্যাশবোর্ড</h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> এডমিন
            </li>
            <li> হোম</li>
        </ol>
    </section>
@stop

<section class="content" style="margin-top: 20px">


    <!--First Row End-->

    <!--Second Row Start-->
    <div class="row custom-dashboard">
    @php
        use App\Models\User;
        $user_count_with_role = User::whereHas('roles', function ($query) {
            $query->where('name','!=', 'Super Admin');
        })->count();
        $user_count_without_role = User::whereDoesntHave('roles')->count();
        $user_count = $user_count_with_role+$user_count_without_role;
        $active_member = DB::table('general_members')
            ->where('status', 1)
            ->count();
        $business = DB::table('business_holds')
            ->where('activate_by', auth()->id())
            ->where('created_at', 'like', date('Y-m-d') . '%')
            ->count();
        $business_all = DB::table('business_holds')
            ->where('activate_by', auth()->id())
            ->count();
        $general = DB::table('general_members')
            ->where('activate_by', auth()->id())
            ->where('created_at', 'like', date('Y-m-d') . '%')
            ->count();
        $general_all = DB::table('general_members')
            ->where('activate_by', auth()->id())
            ->count();
        $commercial = DB::table('commercial_holds')
            ->where('created_at', 'like', date('Y-m-d') . '%')
            ->count()

    @endphp
    <!--Item-->
        @if (Auth::user()->email == 'meyor@gmail.com')
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-success fa fa-fw fa-user"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $user_count }}</div>
                            <span>Total Members</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-success">
                            More info
                        </a>
                    </div>
                </div>
            </div>

            <!--Item-->
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-warning fa fa-fw fa-bar-chart-o"></i>
                        </div>
                        <div>
                            <div class="h2">10</div>
                            <span>Highst House Holding Tax Rate</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-warning">
                            More info
                        </a>
                    </div>
                </div>
            </div>

            <!--Item-->
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-info fa fa-fw fa-users"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $active_member }}</div>
                            <span>Active member</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-info">
                            More info
                        </a>
                    </div>
                </div>
            </div>
            @php
                $today = date('Y-m-d');
                $count_bosot_reg = DB::table('pay_bosot_dues')
                    ->where('date', $today)
                    ->count();
                $count_trade_reg = DB::table('due_trade_licenses')
                    ->where('date', $today)
                    ->count();

                $count_nagorik_reg = DB::table('sanad_applies')
                    ->where('date', $today)
                    ->count()

            @endphp
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-info fa fa-fw fa-users"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $count_bosot_reg }} জন</div>
                            <span>আজকের বসতবাড়ি কর আদায়কৃত ব্যক্তি</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-info">
                            More info
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-info fa fa-fw fa-users"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $count_trade_reg }} জন</div>
                            <span>আজকের ট্রেড লাইসেন্স আদায়কৃত ব্যক্তি</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-info">
                            More info
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-info fa fa-fw fa-users"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $count_nagorik_reg }} জন</div>
                            <span>আজকের নাগরিক সনদ ফি আদায়কৃত ব্যক্তি</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-info">
                            More info
                        </a>
                    </div>
                </div>
            </div>



        @else
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-success fa fa-fw fa-user"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $user_count }}</div>
                            <span>Total Members</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-success">
                            More info
                        </a>
                    </div>
                </div>
            </div>

            <!--Item-->
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-warning fa fa-fw fa-bar-chart-o"></i>
                        </div>
                        <div>
                            <div class="h2">10</div>
                            <span>Highst House Holding Tax Rate</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-warning">
                            More info
                        </a>
                    </div>
                </div>
            </div>

            <!--Item-->
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-info fa fa-fw fa-users"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $active_member }}</div>
                            <span>Active member</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-info">
                            More info
                        </a>
                    </div>
                </div>
            </div>


            <!--Item-->
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-success fa fa-fw fa-user"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $business }}/{{ $business_all }}</div>
                            <span>My Business Hold Registration</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-success">
                            More info
                        </a>
                    </div>
                </div>
            </div>

            <!--Item-->
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-success fa fa-fw fa-user"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $general }}/{{ $general_all }}</div>
                            <span>My General Member Registration</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-success">
                            More info
                        </a>
                    </div>
                </div>
            </div>
            <!--Item-->
            <div class="col-md-4 col-sm-6">
                <div class="dashboard-content">
                    <div class="d-flex justify-content-between p-3">
                        <div class="display-4">
                            <i class="text-success fa fa-fw fa-user"></i>
                        </div>
                        <div>
                            <div class="h2">{{ $commercial }}</div>
                            <span>My Commercial Member Registration</span>
                        </div>
                    </div>
                    <div class="db-link">
                        <a href="" class="bg-success">
                            More info
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!--Second Row Start-->


    <div class="background-overlay"></div>
</section>

@endsection
