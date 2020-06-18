@extends('templates.admin')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Travel</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tambah Travel</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Travel</h4>
                    <form class="mt-4" method="post" action="{{route('owner')}}">
                        @csrf
                        <div class="form-group">
                            <label for="projectinput1">License Number</label>
                            <input type="text" class="form-control {{$errors->has('license_number')?'is-invalid':''}}"
                                   placeholder="License Number" name="license_number" value="{{old('license_number')}}">
                            @if ($errors->has('license_number'))
                                <span class="invalid-feedback" role="alert"><p><b>{{ $errors->first('license_number') }}</b></p></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="projectinput2">Nama Pemilik</label>
                            <input type="text" class="form-control {{$errors->has('business_owner')?'is-invalid':''}}"
                                   placeholder="Nama Pemilik" name="business_owner" value="{{old('business_owner')}}">
                            @if ($errors->has('business_owner'))
                                <span class="invalid-feedback" role="alert"><p><b>{{ $errors->first('business_owner') }}</b></p></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="projectinput2">Nama Usaha</label>
                            <input type="text" class="form-control {{$errors->has('business_name')?'is-invalid':''}}"
                                   placeholder="Nama Usaha" name="business_name" value="{{old('business_name')}}">
                            @if ($errors->has('business_name'))
                                <span class="invalid-feedback" role="alert"><p><b>{{ $errors->first('business_name') }}</b></p></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="projectinput2">Cabang</label>
                            <input type="text" class="form-control {{$errors->has('domicile')?'is-invalid':''}}"
                                   placeholder="Cabang" name="domicile" value="{{old('domicile')}}">
                            @if ($errors->has('domicile'))
                                <span class="invalid-feedback" role="alert"><p><b>{{ $errors->first('domicile') }}</b></p></span>
                            @endif
                        </div>

                        <a href="{{route('owner')}}" class="btn btn-outline-dark">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
