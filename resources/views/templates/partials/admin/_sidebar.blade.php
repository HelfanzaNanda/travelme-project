<div class="scroll-sidebar">
    <!-- User profile -->
    <div class="user-profile">
        <!-- User profile image -->
        <div class="profile-img"> <img src="{{asset('assets/images/users/1.jpg')}}" alt="user" /> </div>
        <!-- User profile text-->
        <div class="profile-text">{{Auth::guard('admin')->user()->name}}</div>
    </div>
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">PERSONAL</li>
            <li><a href="{{route('admin.owner.dashboard')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Dashboard</span></a></li>
            <li><a href="{{route('admin.notification.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Notifikasi</span></a></li>
            <li><a href="{{route('admin.owner.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Owner</span></a></li>
            <li class="nav-devider"></li>
            <li><a href="{{route('admin.travel.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Travel</span></a></li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
