@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Jadwal</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tambah Jadwal</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Jadwal</h4>
                    <form class="form" method="post" action="{{route('schedule.store')}}">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8">


                                    <div class="form-group">
                                        <label for="projectinput2">Tujuan</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('to')?'is-invalid':''}}"
                                               placeholder="Tujuan" name="destination" value="{{old('destination')}}">
                                        @if ($errors->has('destination'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('destination') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label for="projectinput2">Harga</label>
                                        <input type="text" id="rupiah"
                                               class="form-control {{$errors->has('price')?'is-invalid':''}}"
                                               placeholder="Harga" name="price" value="{{old('price')}}">
                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('price') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">Tanggal</label>
                                        <div class='input-group mb-3'>
                                            <input class="form-control {{$errors->has('date')?'is-invalid':''}} date"
                                                   type="text" id="unavailable_date" name="date">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="ti-calendar"></span></span>
                                            </div>
                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <p><b>{{ $errors->first('date') }}</b></p>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="myRepeatingFields" class="form-group">
                                        <label>Jam</label>
                                        <div class="input-group clockpicker entry mt-1" id="time">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary btn-add" type="button">
                                                    <span class="fa fa-plus" aria-hidden="true" style="font-size: 12px;"></span>
                                                </button>
                                            </div>
                                            <input class="form-control {{$errors->has('hour')?'is-invalid':''}}"
                                                   type="text"  name="hour[]">
                                            @if ($errors->has('hour'))
                                                <span class="invalid-feedback" role="alert">
                                                    <p><b>{{ $errors->first('hour') }}</b></p>
                                                </span>
                                            @endif
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                        </div>
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
