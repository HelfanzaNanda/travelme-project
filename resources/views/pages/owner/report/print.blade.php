<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
    </style>
    
    <h4>{{ $name_month }}</h4>

	<table class='table table-bordered'>
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

                <td><a class="detail-icon" id="show_{{$loop->iteration}}" href="#"></a>
                    {{$loop->iteration}}
                </td>
                <td>{{ $key }}</td>
                <td>{{ $groupByDate->count() }}</td>
                
            </tr>

            <tr>
                <td colspan="6">
                    <div id="extra_{{ $loop->iteration }}">
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

</body>
</html>