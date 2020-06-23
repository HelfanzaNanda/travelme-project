@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">driver</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tambah driver</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah driver</h4>
                    <form class="form" method="post" action="{{route('driver.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="projectinput2">NIK</label>
                                        <input type="number"
                                               class="form-control {{$errors->has('nik')?'is-invalid':''}}"
                                               placeholder="NIK" name="nik" value="{{old('nik')}}">
                                        @if ($errors->has('nik'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nik') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">No SIM</label>
                                        <input type="number"
                                               class="form-control {{$errors->has('sim')?'is-invalid':''}}"
                                               placeholder="No SIM" name="sim"
                                               value="{{old('sim')}}">
                                        @if ($errors->has('sim'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('sim') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">Mobil</label>
                                        <select name="car_id" class="form-control">
                                            @foreach($results as $val)
                                                <option value="{{$val->id}}">{{$val->number_plate}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="projectinput2">Nama</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                               placeholder="Nama" name="name" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('name') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="projectinput2">Jenis Kelamin</label>
                                        <select class="form-control" name="gender">
                                            <option value="m">Laki-Laki</option>
                                            <option value="f">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="projectinput3">E-mail</label>
                                        <input class="form-control {{$errors->has('email')?'is-invalid':''}} email-inputmask"
                                               id="email-mask" type="text" placeholder="Enter Email Address"
                                               name="email" value="{{old('email')}}"/>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('email') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="projectinput3">Telephone</label>
                                        <input type="tel"
                                               class="form-control {{$errors->has('telephone')?'is-invalid':''}}"
                                               placeholder="Telephone" name="telephone"
                                               value="{{old('telephone')}}">
                                        @if ($errors->has('telephone'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('telephone') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput3">Alamat</label>
                                        <textarea class="form-control {{$errors->has('address')?'is-invalid':''}}"
                                                  name="address" rows="3"
                                                  placeholder="Alamat">{{old('address')}}</textarea>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('address') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" id="photo" name="avatar" required
                                               class="dropify" data-allowed-file-extensions="png jpeg jpg"
                                               data-max-file-size="1M"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('driver.index') }}" type="button" class="btn btn-warning mr-1"><i class="fa fa-close"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection