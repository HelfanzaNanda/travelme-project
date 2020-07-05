@extends('templates.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Table Data Travle</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Table Data Notifikasi</li>
        </ol>
    </div>
</div>
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span>
            </button>
            <h3 class="text-success"> Berhasil</h3> {{ $message }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">Data Notifikasi</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Licemse Number</th>
                                <th>Bussines Owner</th>
                                <th>Bussines Name</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->license_number}}</td>
                                <td>{{$data->business_owner}}</td>
                                <td>{{$data->business_name}}</td>
                                <td>{{$data->telephone}}</td>
                                <td>
                                    <a href="{{route('admin.owner.destroy', $data->id)}}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
