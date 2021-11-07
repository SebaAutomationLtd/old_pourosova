<ul class="navigation">
    <li class="menu-dropdown {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ URL::to('/dashboard') }}">
            <i class="fa fa-fw ti-receipt"></i> ড্যাশবোর্ড
        </a>
    </li>


    @can('role-management')
        <li
            class="menu-dropdown {{ Request::is('create-general_member') || Request::is('edit-general_member*') || Request::is('take_action_users') || Request::is('new-bosot_index') || Request::is('general-member') || Request::is('family-class') || Request::is('business-hold') || Request::is('all-business_hold') || Request::is('all_business_hold_active') || Request::is('all_business_hold_inactive') || Request::is('general-member-active') || Request::is('general-member-inactive') || Request::is('edit-general_member*') || Request::is('edit-business_hold*') || Request::is('family.class') || Request::is('all-commercial-hold') || Request::is('all-commercial-hold-active') || Request::is('view_commercial_hold*') || Request::is('all-commercial-hold-inactive') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i> রোল পারমিশন ম্যানেজমেন্ট
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li class="menu-dropdown">
                    <a href="{{ route('roles.create') }}"> <i class="fa fa-plus"></i> এড </a>

                </li>

                <li class="menu-dropdown">
                    <a href="{{ route('roles.index') }}"> <i class="fa fa-list"></i> রোল তালিকা </a>

                </li>

            </ul>
        </li>
    @endcan

    @can('user-management')

        <li
            class="menu-dropdown {{ Request::is('create-general_member') || Request::is('edit-general_member*') || Request::is('take_action_users') || Request::is('new-bosot_index') || Request::is('general-member') || Request::is('family-class') || Request::is('business-hold') || Request::is('all-business_hold') || Request::is('all_business_hold_active') || Request::is('all_business_hold_inactive') || Request::is('general-member-active') || Request::is('general-member-inactive') || Request::is('edit-general_member*') || Request::is('edit-business_hold*') || Request::is('family.class') || Request::is('all-commercial-hold') || Request::is('all-commercial-hold-active') || Request::is('view_commercial_hold*') || Request::is('all-commercial-hold-inactive') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i> ইউজার নিবন্ধন
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li class="menu-dropdown">
                    <a href="{{ route('user.create') }}"> <i class="fa fa-plus"></i> এড </a>


                </li>

                <li class="menu-dropdown">
                    <a href="{{ route('user.index') }}"> <i class="fa fa-list"></i> ইউজার তালিকা </a>


                </li>


            </ul>
        </li>

    @endcan

    @canany(['bosot-bari-list', 'business-hold-list', 'commercial-hold-list'])

        <li
            class="menu-dropdown {{ Request::is('create-general_member') || Request::is('general-member') || Request::is('business-hold') || Request::is('all-business_hold') || Request::is('all_business_hold_active') || Request::is('all_business_hold_inactive') || Request::is('general-member-active') || Request::is('general-member-inactive') || Request::is('edit-general_member*') || Request::is('edit-business_hold*') || Request::is('family.class') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i>এসেসমেন্ট নিবন্ধন
                <span class="fa arrow"></span>
            </a>

            <ul class="sub-menu ">
                @can('active-deactive-panel')
                    <li class="menu-dropdown {{ Route::is('action.search') ? 'active' : '' }}">
                        <a href="{{ route('action.search') }}" id=""> <i class="fa fa-fw ti-receipt"></i>
                            একটিভ / ডিএকটিভ
                        </a>
                    </li>
                @endcan
                @can('bosot-bari-list')
                    <li
                        class="menu-dropdown {{ Request::is('create-general_member') || Request::is('edit-general_member*') || Request::is('take_action_users') || Request::is('new-bosot_index') || Request::is('general-member') || Request::is('family-class') || Request::is('general-member-active') || Request::is('general-member-inactive') || Request::is('edit-general_member*') || Request::is('family.class') ? 'active' : '' }}">
                        <a href="#"> <i class="fa fa-fw ti-receipt"></i> বসত বাড়ী হোল্ডিং <span
                                class="fa arrow"></span></a>
                        <ul class="sub-menu ml-3">


                            <li class="menu-dropdown {{ Request::is('new-bosot_index') ? 'active' : '' }}">
                                <a href="{{ URL::to('/new-bosot_index') }}" id="all_bosot_bari"> <i
                                        class="fa fa-fw ti-receipt"></i> মোট ইউজার
                                </a>
                            </li>


                            <li
                                class="menu-dropdown {{ Route::is('general_member_active') || Request::is('edit-general_member*') ? 'active' : '' }}">
                                <a href="{{ route('general_member_active') }}" id="all_bosot_bari_active">
                                    <i class="fa fa-fw ti-receipt"></i> একটিভ ইউজার
                                </a>
                            </li>
                            <li
                                class="menu-dropdown {{ Route::is('general_member_inactive') || Request::is('edit-general_member*') ? 'active' : '' }}">
                                <a href="{{ route('general_member_inactive') }}" id="all_bosot_bari_inactive">
                                    <i class="fa fa-fw ti-receipt"></i> পেন্ডিং ইউজার
                                </a>
                            </li>


                            <li class="menu-dropdown {{ Route::is('family.class') ? 'active' : '' }}">
                                <a href="{{ route('family.class') }}">
                                    <i class="fa fa-fw ti-receipt"></i> পরিবারের শ্রেণীবিন্যাস
                                </a>
                            </li>

                        </ul>
                    </li>

                @endcan

                @can('business-hold-list')

                    <li
                        class="menu-dropdown  {{ Request::is('business-hold') || Request::is('edit-business_hold*') || Request::is('all-business_hold') || Request::is('all_business_hold_active') || Request::is('all_business_hold_inactive') ? 'active' : '' }}">
                        <a href="#"> <i class="fa fa-fw ti-receipt"></i>
                            বানিজ্যিক হোল্ডিং
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu ml-3">

                            <li
                                class="menu-dropdown {{ Route::is('all_business_hold') || Request::is('edit-business_hold*') ? 'active' : '' }}">
                                <a href="{{ route('all_business_hold') }}">
                                    <i class="fa fa-fw ti-receipt"></i> মোট ইউজার
                                </a>
                            </li>
                            <li class="menu-dropdown {{ Route::is('all_business_hold_active') ? 'active' : '' }}">
                                <a href="{{ route('all_business_hold_active') }}">
                                    <i class="fa fa-fw ti-receipt"></i> একটিভ ইউজার
                                </a>
                            </li>
                            <li class="menu-dropdown {{ Route::is('all_business_hold_inactive') ? 'active' : '' }}">
                                <a href="{{ route('all_business_hold_inactive') }}">
                                    <i class="fa fa-fw ti-receipt"></i> পেন্ডিং ইউজার
                                </a>
                            </li>

                        </ul>
                    </li>

                @endcan

                @can('commercial-hold-list')

                    <li
                        class="menu-dropdown {{ Request::is('all-commercial-hold') || Request::is('all-commercial-hold-active') || Request::is('view_commercial_hold*') || Request::is('all-commercial-hold-inactive') ? 'active' : '' }}">
                        <a href="#"> <i class="fa fa-fw ti-receipt"></i>
                            কমার্শিয়াল হোল্ডিং
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu ml-3">

                            <li
                                class="menu-dropdown {{ Route::is('all_commercial_hold') || Request::is('view_commercial_hold*') ? 'active' : '' }}">
                                <a href="{{ route('all_commercial_hold') }}">
                                    <i class="fa fa-fw ti-receipt"></i> মোট ইউজার
                                </a>
                            </li>
                            <li
                                class="menu-dropdown {{ Route::is('all_commercial_hold_active') || Request::is('view_commercial_hold*') ? 'active' : '' }}">
                                <a href="{{ route('all_commercial_hold_active') }}">
                                    <i class="fa fa-fw ti-receipt"></i> একটিভ ইউজার
                                </a>
                            </li>
                            <li class="menu-dropdown {{ Route::is('all_commercial_hold_inactive') ? 'active' : '' }}">
                                <a href="{{ route('all_commercial_hold_inactive') }}">
                                    <i class="fa fa-fw ti-receipt"></i> পেন্ডিং ইউজার
                                </a>
                            </li>

                        </ul>
                    </li>

                @endcan


            </ul>
        </li>
    @endcanany

    @can('other-setup')

        <li
            class="menu-dropdown {{ Request::is('create-chairmen') || (Request::is('all-chairmen') || Request::is('edit-chairmen*') || Request::is('post-code') || Request::is('create-post_code') || Request::is('edit-post_code*') || Request::is('post-office') || Request::is('create-post_office') || Request::is('edit-post_office*') || Request::is('ward') || Request::is('edit-ward*') || Request::is('create-ward') || Request::is('village') || Request::is('create-village') || Request::is('edit-village*') || Request::is('occupation') || Request::is('create-occupation') || Request::is('business-type') || Request::is('create-business_type') || Request::is('edit-business_type*')) ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i>‌অন্যান্য সেটআপ
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu {{ Route::is('post.code') ? 'active' : '' }}">
                <li>
                    <a href="#"> <i class="fa fa-fw ti-receipt"></i> ইউনিয়ন ইনফরমেশন
                    </a>
                </li>
                <li
                    class="{{ Route::is('post.code') || Request::is('create-post_code') || Route::is('edit.post_code') ? 'active' : '' }}">
                    <a href="{{ route('post.code') }}"> <i class="fa fa-fw ti-receipt"></i> পোস্ট কোড সেটআপ
                    </a>
                </li>
                <li
                    class="{{ Route::is('post.office') || Request::is('create-post_office') || Route::is('edit.post_office') ? 'active' : '' }}">
                    <a href="{{ route('post.office') }}"> <i class="fa fa-fw ti-receipt"></i>
                        ডাকঘর সেটআপ
                    </a>
                </li>
                <li
                    class="{{ Route::is('ward') || Request::is('create-ward') || Route::is('edit.ward') ? 'active' : '' }}">
                    <a href="{{ route('ward') }}"> <i class="fa fa-fw ti-receipt"></i> ওয়ার্ড
                    </a>
                </li>
                <li
                    class="{{ Route::is('village') || Request::is('create-village') || Route::is('edit.village') ? 'active' : '' }}">
                    <a href="{{ route('village') }}"> <i class="fa fa-fw ti-receipt"></i> গ্রাম
                    </a>
                </li>
                <li
                    class="{{ Route::is('occupation') || Request::is('create-occupation') || Route::is('edit.occupation') ? 'active' : '' }}">
                    <a href="{{ route('occupation') }}"> <i class="fa fa-fw ti-receipt"></i> পেশা
                    </a>
                </li>
                <li
                    class="{{ Route::is('business.type') || Request::is('create-business_type') || Route::is('edit.business_type') ? 'active' : '' }}">
                    <a href="{{ route('business.type') }}"> <i class="fa fa-fw ti-receipt"></i> ব্যবসার ধরণ
                    </a>
                </li>
            </ul>
        </li>

    @endcan

    @can('tax-rate-setup')

        <li
            class="menu-dropdown {{ Request::is('house-type') || Request::is('edit-house_type*') || Request::is('create-house_type') || Request::is('house-rate') || Request::is('create-house_rate') || Request::is('edit-house_rate*') || Request::is('business-rate') || Request::is('create-business_rate') || Request::is('edit-business_rate*') || Request::is('trade-fee') || Request::is('create-trade') || Request::is('edit-trade*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i>কর রেট সেটআপ
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li
                    class="{{ Route::is('house.type') || Request::is('create-house_type') || Route::is('edit.house_type') ? 'active' : '' }}">
                    <a href="{{ route('house.type') }}"> <i class="fa fa-fw ti-receipt"></i>বাড়ির ধরণ সেটআপ
                    </a>
                </li>
                <li
                    class="{{ Route::is('house_type.rate') || Request::is('create-house_rate') || Route::is('edit.house_rate') ? 'active' : '' }}">
                    <a href="{{ route('house_type.rate') }}"> <i class="fa fa-fw ti-receipt"></i> বসতবাড়ীর
                        হোল্ডিং
                        কর
                        রেট
                    </a>
                </li>
                <li
                    class="{{ Route::is('business.rate') || Request::is('create-business_rate') || Route::is('edit.business_rate') ? 'active' : '' }}">
                    <a href="{{ route('business.rate') }}"> <i class="fa fa-fw ti-receipt"></i>বানিজ্যিক
                        হোল্ডিং
                        কর রেট
                    </a>
                </li>
                <li
                    class="{{ Route::is('trade.fee') || Request::is('create-trade') || Route::is('edit.trade') ? 'active' : '' }}">
                    <a href="{{ route('trade.fee') }}"> <i class="fa fa-fw ti-receipt"></i> ট্রেড লাইসেন্স
                        ফি
                    </a>
                </li>
            </ul>
        </li>

    @endcan

    @can('website-settings')

        <li id="rate_open_close"
            class="menu-dropdown {{ Request::is('create-meyor') || Request::is('all-slider') || Request::is('edit-website_slider*') || Request::is('add-slider') || Request::is('welcome-description') || Request::is('councilors') || Request::is('add-councilor') || Request::is('edit-councilor*') || Request::is('councilors-mohila') || Request::is('add-mohila_councilor') || Request::is('edit-mohila_councilor*') || Request::is('important-topic') || Request::is('add-link') || Request::is('edit-important-link*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i>‌ওয়েবসাইট সেটিংস
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li class="{{ Request::is('create-meyor') ? 'active' : '' }}">
                    <a style="display: none;" href="{{ route('create.chaimen') }}"> <i class="fa fa-fw ti-receipt"></i>
                        মেয়র
                    </a>

                    <a href="{{ URL::to('/create-meyor') }}"> <i class="fa fa-fw ti-receipt"></i>
                        মেয়র
                    </a>
                </li>

                <li
                    class="{{ Request::is('all-slider') || Request::is('edit-website_slider*') || Request::is('add-slider') ? 'active' : '' }}">

                    <a href="{{ URL::to('/all-slider') }}"> <i class="fa fa-fw ti-receipt"></i>
                        স্লাইডার
                    </a>
                </li>


                <li class="{{ Request::is('welcome-description') ? 'active' : '' }}">

                    <a href="{{ URL::to('/welcome-description') }}"> <i class="fa fa-fw ti-receipt"></i>স্বাগতম
                        বিবরণ
                    </a>
                </li>


                <li
                    class="{{ Request::is('councilors') || Request::is('add-councilor') || Request::is('edit-councilor*') ? 'active' : '' }}">

                    <a href="{{ URL::to('/councilors') }}"> <i class="fa fa-fw ti-receipt"></i>
                        সম্মানিত কাউন্সিলরগণ
                    </a>
                </li>


                <li
                    class="{{ Request::is('councilors-mohila') || Request::is('add-mohila_councilor') || Request::is('edit-mohila_councilor*') ? 'active' : '' }}">


                    <a href="{{ URL::to('/councilors-mohila') }}"> <i class="fa fa-fw ti-receipt"></i>
                        সংরক্ষিত আসনের কাউন্সিলরগণ
                    </a>
                </li>


                <li
                    class="{{ Request::is('important-topic') || Request::is('add-link') || Request::is('edit-important-link*') ? 'active' : '' }}">

                    <a href="{{ URL::to('/important-topic') }}"> <i class="fa fa-fw ti-receipt"></i>গুরুত্বপূর্ণ
                        লিঙ্কসমূহ/গুরুত্বপূর্ণ
                        আবেদনপত্র
                    </a>
                </li>
            </ul>
        </li>

    @endcan

    @can('trade-license-due')

        <li class="menu-dropdown {{ Request::is('trade-due') ? 'active' : '' }}">
            <a href="{{ URL::to('/trade-due') }}" id="dashboard">
                <i class="fa fa-fw ti-receipt"></i> ট্রেড লাইসেন্স বকেয়সমূহ
            </a>
        </li>

    @endcan

    @can('beneficiary-management')

        <li class="menu-dropdown {{ Request::is('add-beneficiaries') || Request::is('all-beneficiaries') || Request::is('edit-beneficial*') || Request::is('all-allowance') ? 'active' : '' }}"
            id="rate_open_close">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i>
                সুবিধাভোগীদের তথ্য

                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li class="{{ Request::is('add-beneficiaries') ? 'active' : '' }}">
                    <a href="{{ URL::to('/add-beneficiaries') }}"> <i class="fa fa-fw ti-receipt"></i>অ্যাড
                    </a>
                </li>

                <li class="{{ Request::is('all-beneficiaries') || Request::is('edit-beneficial*') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-beneficiaries') }}"> <i class="fa fa-fw ti-receipt"></i>মোট
                        তালিকা
                    </a>
                </li>


                <li class="{{ Request::is('all-allowance') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-allowance') }}"> <i class="fa fa-fw ti-receipt"></i>ভাতা
                        তালিকা
                    </a>
                </li>
            </ul>
        </li>

    @endcan

    @can('reports')
        <li class="menu-dropdown {{ Request::is('all-report') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i> রিপোর্ট
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li class="{{ Request::is('/all-report') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-report') }}"> <i class="fa fa-fw ti-receipt"></i>
                        সনদ
                    </a>
                </li>

                <li class="{{ Request::is('/bosot-bari-holding-report') ? 'active' : '' }}">
                    <a href="{{ URL::to('/bosot-bari-holding-report') }}"> <i class="fa fa-fw ti-receipt"></i>
                        বসত বাড়ী হোল্ডিং রিপোর্ট
                    </a>
                </li>

            </ul>
        </li>
    @endcan

    @can('certificate-list')
        <li class="menu-dropdown {{ Request::is('all-nagorik_sonod') || Request::is('all-character_sonod') || Request::is('all-warish_sonod') || Request::is('all-dead_sonod') || Request::is('all-orphan_sonod') ? 'active' : '' }}"
            id="rate_open_close">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i>‌সনদের আবেদনসমূহ
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li class="{{ Request::is('all-nagorik_sonod') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-nagorik_sonod') }}"> <i class="fa fa-fw ti-receipt"></i>নাগরিক
                        সনদ
                    </a>
                </li>

                <li class="{{ Request::is('all-character_sonod') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-character_sonod') }}"> <i class="fa fa-fw ti-receipt"></i>চারিত্রিক
                        সনদ
                    </a>
                </li>

                <li class="{{ Request::is('all-warish_sonod') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-warish_sonod') }}"> <i class="fa fa-fw ti-receipt"></i>ওয়ারিশ
                        সনদ
                    </a>
                </li>


                <li class="{{ Request::is('all-dead_sonod') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-dead_sonod') }}"> <i class="fa fa-fw ti-receipt"></i>মৃত্যু
                        সনদ
                    </a>
                </li>

                <li class="{{ Request::is('all-orphan_sonod') ? 'active' : '' }}">
                    <a href="{{ URL::to('/all-orphan_sonod') }}"> <i class="fa fa-fw ti-receipt"></i>এতিম
                        সনদ
                    </a>
                </li>

                <li class=" {{ route::is('trade.approvel') ? 'active' : '' }}">
                    <a href="{{ route('trade.approvel') }}" id="dashboard">
                        <i class="fa fa-fw ti-receipt"></i> ট্রেড লাইসেন্স আবেদনের তালিকাসমূহ
                    </a>
                </li>

            </ul>
        </li>
    @endcan
    @can('bosot-bari-due')
        <li class="menu-dropdown {{ Request::is('new-bosot_bokeya_list') || Request::is('new_total_bosot_bokeya_list') || Request::is('new_bosot_due_aday_list') ? 'active' : '' }}"
            id="rate_open_close">
            <a href="#">
                <i class="fa fa-fw ti-receipt"></i>‌বসতবাড়ি বকেয়াসমূহ
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu ">
                <li class="{{ Request::is('new-bosot_bokeya_list') ? 'active' : '' }}">
                    <a href="{{ URL::to('/new-bosot_bokeya_list') }}"> <i class="fa fa-fw ti-receipt"></i>বকেয়া
                        কর
                        তালিকা
                    </a>
                </li>

                <li class="{{ Request::is('new_total_bosot_bokeya_list') ? 'active' : '' }}">
                    <a href="{{ URL::to('/new_total_bosot_bokeya_list') }}"> <i class="fa fa-fw ti-receipt"></i>মোট
                        তালিকা
                    </a>
                </li>


                <li class="{{ Request::is('new_bosot_due_aday_list') ? 'active' : '' }}">
                    <a href="{{ URL::to('/new_bosot_due_aday_list') }}"> <i class="fa fa-fw ti-receipt"></i>আদায়
                        তালিকা
                    </a>
                </li>

            </ul>
        </li>
    @endcan
    @can('support-admin-management')
        {{-- <li class="{{ Request::is('support_admin') ? 'active' : '' }}">
            <a href="{{ route('supportAdmin.index') }}"> <i class="fa fa-fw ti-receipt"></i>
                সাপোর্ট
                এডমিন
            </a>
        </li> --}}

        <li class="{{ Request::is('support_admin') ? 'active' : '' }}">
            <a href="{{ route('activeReport.index') }}"> <i class="fa fa-fw ti-receipt"></i> একটিভ তালিকা
            </a>
        </li>

    @endcan

</ul>
