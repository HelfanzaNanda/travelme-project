<div class="scroll-sidebar">
    <!-- User profile -->
    <div class="user-profile">
        <!-- User profile image -->
        <div class="profile-img"> <img src="{{Auth::guard('owner')->user()->photo}}" alt="user" /> </div>
        <!-- User profile text-->
        <div class="profile-text">{{Auth::guard('owner')->user()->business_name}}</div>
    </div>
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">Data</li>
            <li><a href="{{route('owner.dashboard')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Dashboard</span></a></li>
            {{-- <li><a href="{{route('owner.dashboard.chart')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Dashboard</span></a></li> --}}
            <li><a href="{{route('car.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Mobil</span></a></li>
            <li><a href="{{route('driver.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Driver</span></a></li>
            <li><a href="{{route('schedule.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Jadwal</span></a></li>
            <li class="nav-devider"></li>
            <li><a href="{{route('owner.user.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Penumpang</span></a></li>
            <li><a href="{{route('owner.report.index')}}"><i class="mdi mdi-gauge"></i><span class="menu-title">Laporan</span></a></li>
            {{-- <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Order</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="index.html">Belum di Konfirmasi</a></li>
                    <li><a href="index2.html">Sudah di Konfirmasi</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
