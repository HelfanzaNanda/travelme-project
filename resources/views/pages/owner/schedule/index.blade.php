@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Tabel Data Jadwal</h3>
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <a href="{{route('schedule.create')}}" class="btn float-right hidden-sm-down btn-success"><i
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
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3> {{ $message }}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Perjalanan</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key => $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->from .' -> '. $data->destination}}</td>
                                <td>{{'Rp.'.number_format($data->price)}}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm" data-toggle="collapse"
                                        data-target="#collapse{{$data->id}}" aria-expanded="false"
                                        aria-controls="collapseA1">
                                        <i class="mdi mdi-eye"></i></a>
                                    <a href="{{route('schedule.edit', $data->id)}}" class="btn btn-warning btn-sm"><i
                                            class="mdi mdi-pencil"></i></a>
                                    <a href="{{route('schedule.destroy', $data->id)}}"
                                        onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>

                            <tr id="collapse{{$data->id}}" class="collapse" aria-labelledby="headingAOne">
                                <td>#</td>
                                <td colspan="4">
                                    <div class="container">
                                        <div class="row">
                                        @foreach ($data->dates()->whereDate('date','>=',Carbon\Carbon::now()->format('Y-m-d'))->take(7)->get() as $date)

                                        <div class="col-md-3 flex-fill text-center">
                                            <div class="card border-success shadow-sm bg-white rounded ">
                                                <div class="card-header bg-info text-white">{{ Carbon\Carbon::parse($date->date)->dayName }}</div>
                                                <div class="card-body text-black pull-left">
                                                  <h5 class="card-title">{{ $date->date }}</h5>
                                                  @foreach ($date->hours as $hour)
                                                  <div class="panel panel-info border-success shadow-sm bg-white rounded">
                                                    <div class="panel-heading bg-success text-white">Jam : {{ Carbon\Carbon::parse($hour->hour)->format("H:i") }} WIB</div>
                                                    <div class="panel-body">Total Kursi : {{ $hour->seat }}</div>
                                                    <div class="panel-body">Sisa Kursi : {{ $hour->remaining_seat }}</div>
                                                  </div>
                                                  @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>
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
