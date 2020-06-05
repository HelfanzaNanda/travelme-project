@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">Table Data Penumpang</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Table Data Penumpang</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <a href="{{route('schedule.create')}}" class="btn float-right hidden-sm-down btn-success"><i
                        class="mdi mdi-plus-circle"></i>Create</a>
        </div>
    </div>
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle">Data Penumpang</h6>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penumpang</th>
                                <th>Perjalanan</th>
                                <th>Total Harga / Kursi</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $key => $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->user->name}}</td>
                                    <td>{{$data->departure->from .' -> '. $data->departure->destination}}</td>
                                    <td>{{'Rp.'.number_format($data->total_price)}}/{{$data->total_seat}} Kursi</td>
                                    <td>
                                        <a href="{{route('owner.user.show', $data->id)}}" class="btn btn-info btn-sm"><i
                                                    class="mdi mdi-eye"></i></a>
                                        <a href="{{route('schedule.edit', $data->id)}}" class="btn btn-warning btn-sm"><i
                                                    class="mdi mdi-pencil"></i></a>
                                        <a href="{{route('schedule.destroy', $data->id)}}"
                                           onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"
                                           class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-delete"></i></a>
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
