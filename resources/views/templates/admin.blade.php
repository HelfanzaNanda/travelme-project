<!DOCTYPE html>
<html lang="en">
@include('templates.partials.admin._head')

<body class="fix-header card-no-border fix-sidebar">

<div id="main-wrapper">

    <header class="topbar">
        @include('templates.partials.admin._navbar')
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        @include('templates.partials.admin._sidebar')
    </aside>

    <div class="page-wrapper">

        <div class="container-fluid">
            @yield('content')
        </div>

        @include('templates.partials.admin._footer')

    </div>
</div>
@include('templates.partials.admin._script')
</body>

</html>
