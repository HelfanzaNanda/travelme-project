<!DOCTYPE html>
<html lang="en">
@include('templates.partials.owner._head')

<body class="fix-header card-no-border fix-sidebar">

<div id="main-wrapper">

    <header class="topbar">
        @include('templates.partials.owner._navbar')
    </header>

    <aside class="left-sidebar">
        @include('templates.partials.owner._sidebar')
    </aside>

    <div class="page-wrapper">

        <div class="container-fluid">
            @yield('content')
        </div>

        @include('templates.partials.owner._footer')

    </div>
</div>
@include('templates.partials.owner._script')
</body>

</html>
