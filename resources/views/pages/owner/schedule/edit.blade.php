@extends('templates.owner')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Jadwal</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Jadwal</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Jadwal</h4>
                    <form class="form" method="post" action="{{route('schedule.update', $departure->id)}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <div class="form-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="projectinput2">Tujuan</label>
                                        @php
                                            $destination = ['Bandung', 'Bekasi', 'Bogor', 'Jakarta', 
                                            'Jogja', 'Magelang', 'Malang','Semarang', 'Solo', 
                                            'Surabaya', 'Tanggerang'];
                                        @endphp
                                        <select name="destination" class="form-control">
                                            @for ($i = 0; $i < count($destination); $i++)
                                                <option value="{{ $destination[$i] }}" 
                                                {{ $departure->destination == $destination[$i] ? 'selected' :'' }}>
                                                    {{ $destination[$i] }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" id="rupiah"
                                                   class="form-control {{$errors->has('price')?'is-invalid':''}}"
                                                name="price" value="{{$departure->price}}">
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('price') }}</b></p>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="projectinput2">Tanggal</label>
                                        <div class='input-group mb-3'>
                                            <input type="text" id="unavailable_date"
                                                   class="form-control {{$errors->has('date')?'is-invalid':''}} date"
                                                   name="date" value="{{$date}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="ti-calendar"></span></span>
                                            </div>
                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <p><b>{{ $errors->first('date') }}</b></p>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <label>Jam</label>
                                    <div id="myRepeatingFields" class="form-group">
                                        @foreach($hours as $hour)
                                            <div class="input-group clockpicker entry mt-1" id="time">
                                                <div class="input-group-prepend">

                                                </div>
                                                <input type="text"
                                                       class="form-control {{$errors->has('hour')?'is-invalid':''}}"
                                                       name="hour[]" value="{{$hour}}">
                                                @if ($errors->has('hour'))
                                                    <span class="invalid-feedback" role="alert">
                                                            <p><b>{{ $errors->first('hour') }}</b></p>
                                                        </span>
                                                @endif
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('schedule.index') }}" type="button" class="btn btn-warning mr-1">
                                <i class="fa fa-close"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')


    <script>
        var rupiah = document.getElementById('rupiah')
        rupiah.addEventListener('keyup', function (e) {
            rupiah.value = formatRupiah(this.value)
        })


        function formatRupiah(angka) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
            return rupiah;
        }
    </script>
@endsection