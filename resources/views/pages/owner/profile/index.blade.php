@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Profile</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-md-12 col-lg-4 col-xlg-3">
        <div class="card">
            <div class="card-body">
                <center class="mt-4"> <img src="{{ $owner->photo }}" class="img-circle" width="150" />
                    <h4 class="card-title mt-2">{{ $owner->business_owner }}</h4>
                    <h6 class="card-subtitle">{{ $owner->business_name }}</h6>
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> 
                <small class="text-muted">Email address </small>
                <h6>{{ $owner->email }}</h6> 
                <small class="text-muted p-t-30 db">Phone</small>
                <h6>{{ $owner->telephone }}</h6> 
                <small class="text-muted p-t-30 db">Address</small>
                <h6>{{ $owner->address }}</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-md-12 col-lg-8 col-xlg-9">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
        </div>
        @endif
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#update" role="tab">Update Profile</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="update" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data" action="{{ route('owner.profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="col-md-12">No Hp</label>
                                <div class="col-md-12">
                                    <input type="tel" value="{{ $owner->telephone }}" name="telephone"
                                    class="form-control {{$errors->has('telephone')?'is-invalid':''}} form-control-line">
                                    @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('telephone') }}</b></p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" value="password" name="password"
                                    class="form-control {{$errors->has('password')?'is-invalid':''}} form-control-line">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('password') }}</b></p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Alamat</label>
                                <div class="col-md-12">
                                    <textarea class="form-control {{$errors->has('address')?'is-invalid':''}} form-control-line"
                                        rows="5" name="address">{{ $owner->address }}</textarea>
                                    @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('address') }}</b></p>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="hidden" value="{{$owner->photo}}" name="old_photo">
                                <input type="file" id="input-file-now-custom-1"
                                       name="photo" class="dropify"
                                       data-default-file="{{$owner->photo}}"
                                       data-allowed-file-extensions="png jpeg jpg"
                                       data-max-file-size="1M"/>
                            </div>
                            <div class="form-actions">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection
