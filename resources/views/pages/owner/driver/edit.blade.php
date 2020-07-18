@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Edit Supir</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" method="post" action="{{route('driver.update', $data->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">NIK</label>
                                        <input type="number" class="form-control" value="{{$data->nik}}"
                                               readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">No SIM</label>
                                        <input type="number" class="form-control" value="{{$data->sim}}"
                                               readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">Mobil</label>
                                        <input type="text" class="form-control" value="{{$data->car->number_plate}}"
                                               readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">Nama</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                               placeholder="Nama" name="name" value="{{$data->name}}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('name') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="projectinput2">Jenis Kelamin</label>
                                        <select class="form-control" name="gender">
                                            <option value="m" @if($data->gender == 'm'){{"selected"}} @endif>
                                                Laki-Laki
                                            </option>
                                            <option value="f" @if($data->gender == 'f'){{"selected"}} @endif>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput3">E-mail</label>
                                        <input type="text" class="form-control" value="{{$data->email}}"
                                               readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput3">Telephone</label>
                                        <input type="tel"
                                               class="form-control {{$errors->has('telephone')?'is-invalid':''}}"
                                               placeholder="Telephone" name="telephone"
                                               value="{{$data->telephone}}">
                                        @if ($errors->has('telephone'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('telephone') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control {{$errors->has('address')?'is-invalid':''}}"
                                                  name="address" rows="3" placeholder="Alamat">{{$data->address}}</textarea>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('address') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="hidden" name="old_avatar" value="{{$data->avatar}}">
                                        <input type="file" id="photo" name="avatar"
                                               class="dropify" data-allowed-file-extensions="png jpeg jpg"
                                               data-max-file-size="1M"
                                               data-default-file="{{$data->avatar}}"/>
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
