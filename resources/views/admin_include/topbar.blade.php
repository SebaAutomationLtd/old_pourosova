<nav class="navbar navbar-static-top" role="navigation">
    <a href="{{ url('/') }}" class="logo text-left">
        <!-- Add the icon to your logo image or logo icon to add the marginin -->
        <img style="max-width: 210px;" src="{{ asset('img/admin.svg') }}" alt="logo" />
    </a>
    <!-- Header Navbar: style can be found in header-->
    <!-- Sidebar toggle button-->
    <div class="mr-auto">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                class="fa fa-fw ti-menu"></i>
        </a>
    </div>
    <div class="navbar-right">
        <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown-->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                    <img src="{{ asset('new_dash/img/authors/avatar1.jpg') }}" width="35"
                        class="rounded-circle img-fluid float-left" height="35" alt="User Image">
                    <div class="riot">
                        <div>
                            {{ Auth::user()->name }}
                            <span><i class="fa fa-sort-down"></i></span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('new_dash/img/authors/avatar1.jpg') }}" class="rounded-circle"
                            alt="User Image">
                        <p> {{ Auth::user()->name }}</p>
                    </li>
                    <!-- Menu Body -->
                    <li class="p-t-3">
                        <a href="{{ route('password_change.view') }}" class="dropdown-item">
                            <i class="fas fa-lock"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="p-t-3">
                        <a href="{{ route('email_change.view') }}" class="dropdown-item">
                            <i class="fas fa-envelope"></i>
                            Change Email
                        </a>
                    </li>
                    <li role="presentation" class="dropdown-divider"></li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="">
                            <a href="{{ URL::to('/logout') }}" class="btn btn-sm btn-danger text-light btn-block"
                                id="logout">
                                <i class="fa fa-fw ti-shift-right"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</nav>
