@extends('templates.owner')
@section('content')

<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Edit Mobil</h3>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="form" method="post" action="{{route('car.update', $data->id)}}"
                    enctype="multipart/form-data">
                  {{csrf_field()}}
                  {{method_field('patch')}}
                  <div class="form-body">
                      <div class="row d-flex justify-content-center">
                          <div class="col-md-10">
                              <div class="form-group">
                                  <label for="projectinput2">Nomor Plat</label>
                                  <input type="text" class="form-control" value="{{$data->number_plate}}"
                                         readonly>
                              </div>


                            <div class="form-group">
                                <label for="projectinput2">Mobil</label>
                                <input type="text" value="{{ $data->name }}" name="name"
                                class="form-control {{$errors->has('name')?'is-invalid':''}}">
                                @if ($errors->has('name'))
                                      <span class="invalid-feedback" role="alert">
                                          <p><b>{{ $errors->first('name') }}</b></p>
                                      </span>
                                  @endif
                            </div>

                              <div class="form-group">
                                  <label for="projectinput3">Kursi</label>
                                  <input type="tel"
                                         class="form-control {{$errors->has('seat')?'is-invalid':''}}"
                                         name="seat" value="{{$data->seat}}">
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
                                         name="facility" value="{{$data->facility}}">
                                  @if ($errors->has('facility'))
                                      <span class="invalid-feedback" role="alert">
                                          <p><b>{{ $errors->first('facility') }}</b></p>
                                      </span>
                                  @endif
                              </div>
                
                              <div class="form-group">
                                  <label for="">Foto</label>
                                  <input type="hidden" value="{{$data->photo}}" name="old_photo">
                                  <input type="file" id="input-file-now-custom-1"
                                         name="photo" class="dropify"
                                         data-default-file="{{$data->photo}}"
                                         data-allowed-file-extensions="png jpeg jpg"
                                         data-max-file-size="1M"/>
                              </div>
                
                
                          </div>
                
                      </div>
                  </div>
                
                  <div class="form-actions">
                      <a href="{{ route('car.index') }}" type="button" class="btn btn-warning mr-1"><i class="fa fa-close"></i> Cancel</a>
                      <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> Update
                      </button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
