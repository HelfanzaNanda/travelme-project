@extends('templates.admin')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Travel</h4>
                    <div class="text-right">
                        <h2 class="card-text font-light mb-0"><i class="ti-car text-success"></i> {{ $owner }}</h2>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User</h4>
                    <div class="text-right">
                        <h2 class="card-text font-light mb-0"><i class=" ti-user text-success"></i>{{ $user }}</h2>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
@endsection
