@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Tabel Data Laporan</h3>
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
                <form action="{{ route('owner.report.search') }}" method="POST">
                    <div class="row mb-3">
                        @csrf
                        <div class="col-md-4">
                            @php($month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                            'Agustus', 'September', 'Oktober', 'November', 'Desember'])
                            <select name="month" class="form-control">
                                @for ($i = 0; $i < count($month); $i++) 
                                    <option value="{{ $i }}"
                                    {{ $number_month == $i ? 'selected' : '' }}>
                                    {{ $month[$i] }}
                                </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>

                        {{-- <div class="col-md-1">
                            <a href="{{ route('owner.report.print', $number_month) }}" type="button" class="btn btn-primary">print</a>
                        </div> --}}

                    </div>
                </form>
                <form action="{{ route('owner.report.print') }}" method="POST">
                    @csrf
                    <input type="hidden" id="month" name="month">
                    <button type="submit" class="btn btn-primary">print</button>
                </form>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Total Pesanan Di Konfirmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupByDates as $key => $groupByDate)
                            <tr>

                                <td><a class="detail-icon" id="show_{{$loop->iteration}}" href="#">
                                        <i class="fa far fa-times-circle"></i> </a>
                                    {{$loop->iteration}}
                                </td>
                                <td>{{ $key }}</td>
                                <td>{{ $groupByDate->count() }}</td>
                                
                            </tr>

                            <tr>
                                <td colspan="6">
                                    <div id="extra_{{ $loop->iteration }}" style="display: none">
                                        @php($destinations = array())
                                        @foreach ($groupByDate as $key => $item)
                                        @if (isset($destinations[$item->departure->destination]))
                                        @php($destinations[$item->departure_id] += $item->departure->destination)
                                        @else    
                                        @php($destinations[$item->departure_id] = $item->departure->destination)
                                        @endif
                                        <p><b>Perjalanan : {{ $destinations[$item->departure_id] }}</b> </p>
                                        @endforeach

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

@section('script')
<script>
    $("a[id^=show_]").click(function(event) {
        $("#extra_" + $(this).attr('id').substr(5)).slideToggle("slow");
        event.preventDefault();
    });
</script>
@endsection