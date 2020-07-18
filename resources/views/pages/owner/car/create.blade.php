@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Tambah Mobil</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" method="post" action="{{route('car.store')}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10 d-flex flex-column">
                                    <div class="form-group">
                                        <label for="projectinput2">Nomor Plat</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('number_plate')?'is-invalid':''}}"
                                               placeholder="Number Plate" name="number_plate"
                                               value="{{old('number_plate')}}">
                                        @if ($errors->has('number_plate'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('number_plate') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput3">Kursi</label>
                                        <input type="tel"
                                               class="form-control {{$errors->has('seat')?'is-invalid':''}}"
                                               placeholder="Kursi" name="seat" value="{{old('seat')}}">
                                        @if ($errors->has('seat'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('seat') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput3">Fasilitas</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('facility')?'is-invalid':''}}"
                                               placeholder="Fasilitas" name="facility"
                                               value="{{old('facility')}}">
                                        @if ($errors->has('facility'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('facility') }}</b></p>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput3">Foto</label>
                                        <input type="file" id="photo" name="photo" required
                                               class="dropify" data-allowed-file-extensions="png jpeg jpg"
                                               data-max-file-size="1M"/>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('car.index') }}" type="button" class="btn btn-warning mr-1"><i class="fa fa-close"></i> Cancel</a>
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
