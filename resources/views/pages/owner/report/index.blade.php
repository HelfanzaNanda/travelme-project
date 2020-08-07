@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Table Data Laporan</h3>
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
                <form action="{{ route('owner.report.filter') }}" method="POST">
                    <div class="row mb-3">
                        @csrf
                        <div class="col-md-4">
                            @php($months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                            'Agustus', 'September', 'Oktober', 'November', 'Desember'])
                            <select name="month" class="form-control" id="month-select">
                                @for ($i = 0; $i < count($months); $i++)
                                    <option value="{{ $i }}"
                                    {{ $month == $i+1 ? 'selected' : ''}}>{{ $months[$i] }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>
                    </div>
                </form>
                
                {{-- <form action="{{ route('owner.report.print') }}" method="POST">
                    @csrf
                    <input type="hidden" id="month" name="month">
                    <button type="submit" class="btn btn-primary">print</button>
                </form> --}}
                
                <div class="table-responsive m-t-40">

                    <h3>Total Uang di bulan {{ $nameMonth }} : Rp. {{ number_format($totalPriceInMonth) }}</h3>

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Total Uang Masuk</th>
                            </tr>
                        </thead>
                        <tbody>

                            @for($i = 1; $i <= $date; $i++)
                                <tr>
                                    <td><strong> {{ $i }} </strong></td>
                                    <td> <strong> {{isset($results[$i]) ? $results[$i]["date"] : '-'}} </strong></td>
                                    <td> <strong> {{isset($results[$i]) ? 'Rp. '.number_format($results[$i]["total_price"]) : '-'}} </strong></td>
                                </tr>
                            @endfor

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


<script>
    monthSelect = document.querySelector('#month-select');
    month = document.querySelector('#month')
    monthSelect.addEventListener('change', function(){
        month.value = this.value;
    });
</script>
@endsection