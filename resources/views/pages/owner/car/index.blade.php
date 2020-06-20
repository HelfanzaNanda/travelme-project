@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Table Data Mobil</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Table Data Mobil</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <a href="{{route('car.create')}}" class="btn float-right hidden-sm-down btn-success mr-2"><i
                class="mdi mdi-plus-circle"></i>Tambah</a>
    </div>
</div>
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">Data Mobil</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>No Plat</th>
                                <th>Fasilitas</th>
                                <th>Kursi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#default{{$loop->iteration}}" type="button">
                                        <img src="{{ $data->photo }}" width="40px"
                                            height="auto" alt="{{$data->photo}}">
                                    </a>
                                </td>
                                <td>{{$data->number_plate}}</td>
                                <td>{{$data->facility}}</td>
                                <td>{{$data->seat}}</td>
                                <td>
                                    <a href="{{route('car.edit', $data->id)}}" class="btn btn-warning btn-sm"><i
                                            class="mdi mdi-pencil"></i></a>
                                    <a href="{{route('car.destroy', $data->id)}}"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade text-left" id="default{{$loop->iteration}}" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">Image</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{asset('uploads/owner/car/'. $data->photo)}}"
                                                    style="height: auto; width: 480px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection