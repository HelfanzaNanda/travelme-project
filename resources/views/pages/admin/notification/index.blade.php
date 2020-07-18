@extends('templates.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Table Data Notifikasi</h3>
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
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>License Number</th>
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
                                <td>{{$data->business_name}}</td>
                                <td>{{$data->telephone}}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                    <a href="{{route('notification.update', $data->id)}}"
                                        class="btn btn-sm btn-warning"><i class="mdi mdi-check"></i></a>
                                    <a href="{{route('notification.destroy', $data->id)}}" class="btn btn-sm btn-danger"
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
