@extends('templates.owner') @section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Tambah Jadwal</h3>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="form" method="post" action="{{route('schedule.store')}}">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="projectinput2">Dari</label>
                                    <input class="form-control" name="from" readonly="readonly" value="Tegal">
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Tujuan</label>
                                    <select name="destination" class="form-control">
                                        @foreach ($destinations as $dest)
                                        <option value="{{ $dest }}">{{ $dest }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input
                                            type="text"
                                            id="rupiah"
                                            class="form-control {{$errors->has('price')?'is-invalid':''}}"
                                            placeholder="Harga"
                                            name="price"
                                            value="{{old('price')}}">
                                        @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <p>
                                                <b>{{ $errors->first('price') }}</b>
                                            </p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Tanggal</label>
                                    <div class='input-group mb-3'>
                                        <input
                                            class="form-control {{$errors->has('date')?'is-invalid':''}} tanggal"
                                            type="text"
                                            value="{{ old('date') }}"
                                            name="date"
                                            id="tanggal"
                                            readonly="readonly"
                                            style="cursor: pointer; background: white">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="ti-calendar"></span></span>
                                        </div>
                                        @if ($errors->has('date'))
                                        <span class="invalid-feedback" role="alert">
                                            <p>
                                                <b>{{ $errors->first('date') }}</b>
                                            </p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div id="myRepeatingFields" class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Jam</label>
                                        </div>
                                        <div class="col-6">
                                            <label class="">Mobil</label>
                                        </div>
                                    </div>
                                    <div class="input-group entry mt-1" id="time">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-primary btn-add" type="button">
                                                <span class="fa fa-plus" aria-hidden="true" style="font-size: 12px;"></span>
                                            </button>
                                        </div>
                                        <select name="hour[]" class="form-control">
                                            @foreach ($hours as $hour)
                                            <option value="{{ $hour }}">{{ $hour }}</option>
                                            @endforeach
                                        </select>
                                        <select name="car[]" class="form-control">
                                            @foreach ($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->number_plate }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </span>
                                        </div>
                                        @if ($errors->has('hour.0'))
                                        <span class="invalid-feedback" role="alert">
                                            <p>
                                                <b>{{ $errors->first('hour.0') }}</b>
                                            </p>
                                        </span>
                                        @endif
                                      
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Jeda Waktu Pulang</label>
                                    <input
                                        class="form-control {{$errors->has('add_hour')?'is-invalid':''}}"
                                        type="number"
                                        name="add_hour">
                                    @if ($errors->has('add_hour'))
                                    <span class="invalid-feedback" role="alert">
                                        <p>
                                            <b>{{ $errors->first('add_hour') }}</b>
                                        </p>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="reset" class="btn btn-warning mr-1">
                            <i class="fa fa-close"></i>
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i>
                            Save
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
    console.log(dateToday);


	$('.tanggal').datepicker({
		multidate: true,
		format: 'dd-mm-yyyy',
        todayHighlight: true,
        clearBtn: true,
        toggleActive: true,
        startDate: new Date()
	});


	// $('#onSubmit').click(function(){
	// 	var selectDate = $("#unavailable_date").val();
	// 	console.log(selectDate);
	// });
</script>

@endsection
