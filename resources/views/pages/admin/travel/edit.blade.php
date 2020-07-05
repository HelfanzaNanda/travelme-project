@extends('templates.admin')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Travel</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Travel</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Travel</h4>
                    <form class="mt-4" method="post" action="{{route('admin.travel.update', $data->id)}}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>License Number</label>
                            <input type="text" class="form-control" value="{{$data->license_number}}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Nama Pemilik</label>
                            <input type="text" class="form-control {{$errors->has('business_owner')?'is-invalid':''}}"
                                   placeholder="Nama Pemilik" name="business_owner" value="{{ $data->business_owner }}">
                            @if ($errors->has('business_owner'))
                                <span class="invalid-feedback" role="alert"><p><b>{{ $errors->first('business_owner') }}</b></p></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nama Usaha</label>
                            <input type="text" class="form-control {{$errors->has('business_name')?'is-invalid':''}}"
                                   placeholder="Nama Usaha" name="business_name" value="{{$data->business_name}}">
                            @if ($errors->has('business_name'))
                                <span class="invalid-feedback" role="alert"><p><b>{{ $errors->first('business_name') }}</b></p></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="projectinput2">Cabang</label>
                            <input type="text" class="form-control {{$errors->has('domicile')?'is-invalid':''}}"
                                   placeholder="Cabang" name="domicile" value="{{$data->domicile}}">
                            @if ($errors->has('domicile'))
                                <span class="invalid-feedback" role="alert"><p><b>{{ $errors->first('domicile') }}</b></p></span>
                            @endif
                        </div>

                        <a href="{{route('admin.travel.index')}}" class="btn btn-outline-dark">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
