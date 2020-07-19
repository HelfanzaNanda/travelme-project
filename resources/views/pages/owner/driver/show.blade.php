@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">Detail Supir</h3>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <a href="{{route('driver.edit', $data->id)}}" class="btn float-right hidden-sm-down btn-success">
                <i class="mdi mdi-pencil"></i> Edit 
            </a>
        </div>
    </div>
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-12 col-lg-4 col-xlg-3">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4"><img src="{{$data->avatar}}" class="img-circle"
                                              width="150"/>

                        <h4 class="card-title mt-2">{{$data->name}}</h4>
                        <span class="badge {{$data->active? 'badge-success' : 'badge-danger'}}">{{$data->active? 'aktif' : 'tidak aktif'}}</span>

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
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profil</a>
                    </li>
                </ul>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-6 border-right"><strong>NIK</strong>
                                <br>
                                <p class="text-muted">{{$data->nik}}</p>
                            </div>
                            <div class="col-md-6 col-xs-6 border-right"><strong>SIM</strong>
                                <br>
                                <p class="text-muted">{{$data->sim}}</p>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mt-4">Nama Lengkap</h5>
                        <p class="text-muted">{{$data->name}}</p>
                        <h5 class="mt-4">Email</h5>
                        <p class="text-muted">{{$data->email}}</p>
                        <h5 class="mt-4">Alamat</h5>
                        <p class="text-muted">{{$data->address}}</p>
                        <h5 class="mt-4">NoHp</h5>
                        <p class="text-muted">{{$data->telephone}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
