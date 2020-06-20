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

</div>
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span> </button>
            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">Data Penumpang</h6>
                <form action="" method="POST">
                    <div class="row mb-3">

                        @csrf
                        <div class="col-md-4">
                            @php($month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                            'Agustus', 'September', 'Oktober', 'November', 'Desember'])
                            <select name="month" class="form-control">
                                @for ($i = 0; $i < count($month); $i++) <option value="{{ $month[$i] }}">
                                    {{ $month[$i] }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>

                    </div>
                </form>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Total Pesanan Di Konfirmasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($groupByDates as $key => $groupByDate)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $key }}</td>
                                <td>{{ $groupByDate->count() }}</td>

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