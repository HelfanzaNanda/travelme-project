@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Table Data Driver</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Table Data Driver</li>
        </ol>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <a href="{{route('driver.create')}}" class="btn float-right hidden-sm-down btn-success"><i
                class="mdi mdi-plus-circle"></i>Tambah</a>
    </div>
</div>
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
        </div>
        @endif
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span> </button>
            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3> {{ $message }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">Data Driver</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Mobil</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a class="avatar bg-danger" data-toggle="modal"
                                        data-target="#default{{$loop->iteration}}" type="button">
                                        <img src="{{$data->avatar}}" width="40"
                                            height="40">
                                    </a>
                                </td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->car->number_plate}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->telephone}}</td>
                                <td>
                                    <a href="{{route('driver.show', $data->id)}}" class="btn btn-info btn-sm"><i
                                            class="mdi mdi-eye"></i></a>
                                    <a href="{{route('driver.edit', $data->id)}}" class="btn btn-warning btn-sm"><i
                                            class="mdi mdi-pencil"></i></a>
                                    <a href="{{route('driver.destroy', $data->id)}}"
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
                                                <img src="{{$data->avatar}}"
                                                    style="height: 480px; width: 480px;">
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