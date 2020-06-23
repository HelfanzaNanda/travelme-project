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

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
        </div>
        @endif

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
                                <th>Status</th>
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

                                @if ($data->verify == '2')
                                <td><span class="badge badge-success">sudah di konfirmasi</span></td>
                                @elseif ($data->verify == '0')
                                <td><span class="badge badge-danger">pesanan di tolak</span></td>
                                @else
                                <td><span class="badge badge-warning">belum di konfirmasi</span></td>
                                @endif

                                @if ($data->driver)
                                <td>
                                    <a href="{{route('owner.user.show', $data->id)}}" class="btn btn-info btn-sm"><i
                                            class="mdi mdi-eye"></i></a>
                                    @if ($data->verify == '1')
                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#confirmedModal{{ $data->id }}">Konfirmasi</a>
                                    <a href="{{route('owner.user.decline', $data->id)}}"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">
                                        Hapus</a>
                                    @endif
                                </td>
                                @else
                                    <td><span class="badge badge-danger">silahkan tambahkan driver dahulu</span></td>
                                @endif

                                <div class="modal fade" id="confirmedModal{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pilih Driver yang ada di
                                                    Tegal</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('owner.user.confirmed', $data->id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        @php($drivers = \App\Driver::where('owner_id',
                                                        \Illuminate\Support\Facades\Auth::guard('owner')->user()->id)->get())

                                                        <select name="driver_id" class="form-control">
                                                            @foreach ($drivers as $driver)
                                                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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