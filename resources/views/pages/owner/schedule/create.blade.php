@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Jadwal</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Tambah Jadwal</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Jadwal</h4>
                <form class="form" method="post" action="{{route('schedule.store')}}">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="projectinput2">Dari</label>
                                    <input class="form-control" name="from" readonly value="{{ $domicile }}">
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Tujuan</label>

                                    <select name="destination" class="form-control">
                                        @foreach ($destinations as $destination)
                                        <option value="{{ $destination->domicile }}">{{ $destination->domicile }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="form-group">
                                        <label for="projectinput2">Tujuan</label>
                                        @php
                                            $destination = ['Bandung', 'Bekasi', 'Bogor', 'Jakarta', 
                                            'Jogja', 'Magelang', 'Malang','Semarang', 'Solo', 
                                            'Surabaya', 'Tanggerang'];
                                        @endphp
                                        <select name="destination" class="form-control">
                                            @for ($i = 0; $i < count($destination); $i++)
                                                <option value="{{ $destination[$i] }}">{{ $destination[$i] }}</option>
                                @endfor
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="projectinput2">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" id="rupiah"
                                        class="form-control {{$errors->has('price')?'is-invalid':''}}"
                                        placeholder="Harga" name="price" value="{{old('price')}}">
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
                                    <input class="form-control {{$errors->has('date')?'is-invalid':''}} tanggal"
                                        type="text" name="date" id="tanggal">
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

                            <div id="myRepeatingFields" class="form-group">
                                <label>Jam</label>
                                <div class="input-group clockpicker entry mt-1" id="time">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary btn-add" type="button">
                                            <span class="fa fa-plus" aria-hidden="true" style="font-size: 12px;"></span>
                                        </button>
                                    </div>
                                    <input class="form-control {{$errors->has('hour')?'is-invalid':''}}" type="text"
                                        name="hour[]">
                                    @if ($errors->has('hour'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('hour') }}</b></p>
                                    </span>
                                    @endif
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>

            <div class="form-actions">
                <button type="reset" class="btn btn-warning mr-1">
                    <i class="fa fa-close"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check-square-o"></i> Save
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

<script>
    var dateToday = new Date();
    
	$('.tanggal').datepicker({
		multidate: true,
		format: 'dd-mm-yyyy',
        todayHighlight: true,
        clearBtn: true,
        toggleActive: true,
        minDate: dateToday
	});

    
	// $('#onSubmit').click(function(){
	// 	var selectDate = $("#unavailable_date").val();
	// 	console.log(selectDate);
	// });
</script>

@endsection