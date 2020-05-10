@extends('templates.admin')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">Table Data Travle</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Table Data Travel</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <a href="{{route('owner')}}" class="btn float-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i>Create</a>
        </div>
    </div>
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle">Data travel</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>License Number</th>
                                <th>Nama Bisnis</th>
                                <th>Nama Pengusaha</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->license_number}}</td>
                                    <td>{{$data->business_name}}</td>
                                    <td>{{$data->business_owner}}</td>
                                    <td>
                                        <a href="{{route('owner', $data->id)}}" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil"></i></a>
                                        <a href="{{route('travel.destroy', $data->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')">
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
