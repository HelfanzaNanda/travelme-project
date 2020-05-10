<div class="scroll-sidebar">
    <!-- User profile -->
    <div class="user-profile">
        <!-- User profile image -->
        <div class="profile-img"> <img src="{{asset('assets/images/users/1.jpg')}}" alt="user" /> </div>
        <!-- User profile text-->
        <div class="profile-text">{{Auth::guard('owner')->user()->business_owner}}</div>
    </div>
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">PERSONAL</li>
            <li><a href="{{route('tdashboard.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Dashboard</span></a></li>
            <li><a href="{{route('driver.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Driver</span></a></li>
            <li><a href="{{route('car.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Mobil</span></a></li>
            <li><a href="{{route('schedule.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Jadwal</span></a></li>
            <li><a href="#"><i class="mdi mdi-gauge"></i><span class="menu-title">Penumpang</span></a></li>
            <li class="nav-devider"></li>
            <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Order</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="index.html">Belum di Konfirmasi</a></li>
                    <li><a href="index2.html">Sudah di Konfirmasi</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
