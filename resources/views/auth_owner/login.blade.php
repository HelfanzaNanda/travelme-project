<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/monster-admin/main/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 03:42:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>login Travel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 him and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="wrapper">
        <div class="login-register">
            <div class="login-box card">

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true">×</span> </button>
                    <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true">×</span> </button>
                    <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3> {{ $message }}
                </div>
                @endif

                <div class="card-header d-flex justify-content-center">Login Travel</div>
                <div class="card-body">
                    <form class="form-horizontal form-material" action="{{route('owner.login.submit')}}" method="post">
                        @csrf
                        <div class="form-group ">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required placeholder="Masukkan Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <input type="password" name="password" required autocomplete="current-password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 col-12 text-center text-sm-left"></div>
                            <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a
                                    href="{{route('owner.password.request')}}" class="card-link">Forgot Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-block"><i class="fa fa-unlock"></i> Login</button>
                        <a href="{{ route('owner.register') }}" type="button" class="btn btn-outline-warning btn-block"><i class="fa fa-registered"></i> Register</a>

                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>



</html>