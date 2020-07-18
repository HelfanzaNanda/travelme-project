<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">
            <!-- Logo icon --><b>
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="{{asset('logo/logo/apple-icon-57x57.png')}}" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="{{asset('logo/logo/favicon-32x32.png')}}" alt="homepage" class="light-logo" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="{{asset('logo/text/travelme.png')}}" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                            <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span>
        </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0 ">
            <!-- This is  -->
            <li class="nav-item"> <a
                    class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                    href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            <li class="nav-item"> <a
                    class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                    href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                   src="{{ Auth::guard('owner')->user()->photo != null : 
                   Auth::guard('owner')->user()->photo ? 
                   asset('logo/travelme.png')}}" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                    <ul class="dropdown-user">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img"><img src="{{ Auth::guard('owner')->user()->photo }}" alt="user"></div>
                                <div class="u-text">
                                    <h4>{{ Auth::guard('owner')->user()->business_name }}</h4>
                                    <br/>
                                    <a href="{{ route('owner.profile.index') }}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('owner.logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</nav>
