<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Register Owner</title>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">

</head>

<body>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div style="background-image:url({{asset('assets/images/background/login-register.jpg')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">{{ __('Register Owner') }}</div>
                        <div class="card-body">
                            <form action="{{route('owner.register.submit')}}" method="post">
                                @csrf
                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$message}}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">License Number</label>
                                            <input type="text" class="form-control {{$errors->has('license_number')?'is-invalid':''}}"
                                                   placeholder="Masukkan Nomor License Anda" name="license_number" value="{{old('lincese_number')}}">
                                            @if ($errors->has('license_number'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('license_number') }}</b></p>
                                                    </span>
                                            @endif
                                        </fieldset>

                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">Nama Pemilik</label>
                                            <input type="text" class="form-control {{$errors->has('business_owner')?'is-invalid':''}}"
                                                   placeholder="Masukkan Nama Pemilik Usaha" name="business_owner" value="{{old('business_owner')}}">
                                            @if ($errors->has('business_owner'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('business_owner')}}</b></p>
                                                    </span>
                                            @endif
                                        </fieldset>

                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">Nama Usaha</label>
                                            <input type="text" class="form-control {{$errors->has('business_name')?'is-invalid':''}}"
                                                   placeholder="Masukkan Nama Usaha" name="business_name" value="{{old('lincese_name')}}">
                                            @if ($errors->has('business_name'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('business_name')}}</b></p>
                                                    </span>
                                            @endif
                                        </fieldset>

                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-name">Alamat</label>
                                            <textarea rows="5" class="form-control {{$errors->has('address')?'is-invalid':''}}"
                                                      name="address" placeholder="Masukkan Alamat">{{old('address')}}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('address')}}</b></p>
                                                    </span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">

                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-email">Your Email Address</label>
                                            <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                                   placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('email')}}</b></p>
                                                    </span>
                                            @endif
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-password">Enter Password</label>
                                            <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                                   placeholder="Masukkan Password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('password')}}</b></p>
                                                    </span>
                                            @endif
                                        </fieldset>
                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-password">Repeat Enter Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   placeholder="Masukkan Password Lagi">
                                        </fieldset>

                                        <fieldset class="form-group floating-label-form-group">
                                            <label for="user-password">No Hp</label>
                                            <input type="number" class="form-control {{$errors->has('telephone')?'is-invalid':''}}"
                                                   placeholder="Masukkan Nomor Handphone" name="telephone" value="{{old('telephone')}}">
                                            @if ($errors->has('telephone'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('telephone')}}</b></p>
                                                    </span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                    </div>
                                    <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right">
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-secondary btn-md">
                                            <i class="fa fa-user"></i> Register</button>
                                    </div>
                                    <div class="float-right">
                                        <a href="{{route('owner.login')}}" class="card-link">Sudah Punya Akun?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

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
