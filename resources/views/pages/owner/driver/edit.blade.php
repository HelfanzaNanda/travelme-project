@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">driver</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit driver</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit driver</h4>
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
                                        <select name="car_id" class="form-control">
                                            @foreach($cars as $car)
                                                <option value="{{$car->id}}" @if($car->id == $data->id_car) {{"selected"}} @endif>
                                                    {{$car->number_plate}}
                                                </option>
                                            @endforeach
                                        </select>
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
                                        <input type="number"
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
                                               data-default-file="{{asset('uploads/owner/driver/'.$data->avatar)}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="fa fa-close"></i> Cancel
                            </button>
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
