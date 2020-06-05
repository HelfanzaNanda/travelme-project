@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">Mobil</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Mobil</li>
            </ol>
        </div>
    </div>
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-12 col-lg-4 col-xlg-3">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"><img src="{{asset('uploads/owner/user/'.$data->photo)}}" class="img-circle"
                                              width="150"/>
                        <h4 class="card-title mt-2">{{$data->user->name}}</h4>
                        <h6 class="card-subtitle">{{$data->user->email}}</h6>
                    </center>
                </div>

            </div>

            <div class="card">
                <div class="card-body">
                    <center class="mt-4">
                        @if($data->car)
                            <img src="{{asset('uploads/owner/user/'.$data->car->photo)}}" class="img-circle"
                                 width="150"/>
                            <h4 class="card-title mt-2">{{$data->user->name}}</h4>
                            <h6 class="card-subtitle">{{$data->user->email}}</h6>
                        @else
                            <h6 class="card-subtitle">Di konfirmasi dahulu</h6>
                        @endif
                    </center>
                </div>
            </div>
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" onchange="loadfile(event)" class="btn btn-success" id="confirmed">Konfirmasi</button>
                        </div>
                        <div class="col-6 pull-right">
                            <a href="" class="btn btn-danger">Tolak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-12 col-lg-8 col-xlg-9">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile"
                                            role="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#schedulle" role="tab">Jadwal</a>
                    </li>

                    <form action="{{route('owner.user.confirmed', $data->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="driver_id">
                                @foreach($drivers as $driver)
                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-sm btn-success">Konfirmasi</button>
                            <a href="{{route('owner.user.decline', $data->id)}}" class="btn btn-sm btn-danger">Tolak</a>
                        </div>
                    </form>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <h5 class="mt-4">Perjalanan</h5>
                            <p class="text-muted">{{$data->departure->from}} -> {{$data->departure->destination}}</p>
                            <h5 class="mt-4">Alamat Penjemputan</h5>
                            <p class="text-muted">{{$data->pickup_location}}</p>
                            <h5 class="mt-4">Alamat Tujuan</h5>
                            <p class="text-muted">{{$data->destination_location}}</p>
                            <h5 class="mt-4">Total Harga</h5>
                            <p class="text-muted">{{'Rp. '.number_format($data->total_price)}} / {{$data->total_seat}}
                                Kursi</p>
                            <h5 class="mt-4">Tanggal dan Jam</h5>
                            <p class="text-muted">{{\Carbon\Carbon::parse($data->date)->format('d m Y')}} {{$data->hour}}</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="schedulle" role="tabpanel">
                        <div class="card-body">
                            <div id="calendar"></div>
                            <h5 class="mt-2">Tanggal</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
@section('script')
    <script>
        const loadfile = function (event) {
            document.getElementById('car').style.display = '';
        };
    </script>
@endsection