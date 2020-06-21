@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        </ol>
    </div>
</div>

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <h3 class="text-danger"> Error</h3> {{ $message }}
    </div>
@endif
<div class="row">
    
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pesanan Masuk Hari Ini</h4>
                <div class="text-right">
                    <h2 class="card-text font-light mb-0"><i class="ti-arrow-down text-success"></i> {{ $count_order_verify }}</h2>
                    <span class="card-text text-muted">Di konfirmasi</span>
                </div>
                <span class="card-text text-success">80%</span>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pesanan Masuk Hari Ini</h4>
                <div class="text-right">
                    <h2 class="card-text font-light mb-0"><i class="ti-arrow-down text-success"></i> {{ $count_order_dont_verify }}</h2>
                    <span class="card-text text-muted">Belum di Konfirmasi</span>
                </div>
                <span class="card-text text-success">80%</span>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-5 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sisa Saldo</h4>
                <div class="text-right mb-3">
                    <h2 class="card-text font-light mb-0">Rp. {{ number_format($owner->balance) }}</h2>
                </div>
                @php($dummy_balance = ['500000', '1000000', '2000000'])
                <form action="{{ route('owner.take.balance') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <select name="balance" class="form-control">
                            @for ($i = 0; $i < count($dummy_balance); $i++)
                            <option value="{{ $dummy_balance[$i] }}">Rp. {{ number_format($dummy_balance[$i]) }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="account_number" class="form-control"
                        placeholder="Nomor Rekening">
                    </div>
                    <div class="form-group">
                        <input type="text" name="account_name" class="form-control"
                        placeholder="Atas Nama Rekening">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">tarik saldo</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection