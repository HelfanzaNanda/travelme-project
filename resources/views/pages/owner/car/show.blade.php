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
                    <center class="mt-4"><img src="{{asset('uploads/owner/car'.$data->photo)}}" class="img-circle"
                                              width="150"/>
                        <h4 class="card-title mt-2">{{$data->destination}}</h4>
                        <h6 class="card-subtitle">{{$data->number_plate}}</h6>
                    </center>
                </div>

            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-12 col-lg-8 col-xlg-9">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#schedulle" role="tab">Jadwal</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <h5 class="mt-4">Nama Mobil</h5>
                            <p class="text-muted">{{$data->name}}</p>
                            <h5 class="mt-4">Dari</h5>
                            <p class="text-muted">{{$data->form}}</p>
                            <h5 class="mt-4">Tujuan</h5>
                            <p class="text-muted">{{$data->destination}}</p>
                            <h5 class="mt-4">Harga</h5>
                            <p class="text-muted">{{'Rp. '.$data->price}}</p>
                            <h5 class="mt-4">Total Kursi</h5>
                            <p class="text-muted">{{$data->seat}}</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="schedulle" role="tabpanel">
                        <div class="card-body">
                            <div id="calendar"></div>
                            <h5 class="mt-2">Tanggal</h5>
                            @foreach($data->dates as $date)
                                <p class="text-muted">
                                    {{$date->date}}
                                    @foreach($date->hours as $hour)
                                        {{\Carbon\Carbon::parse($hour->hour)->format('H:i').'WIB'}}
                                    @endforeach
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
