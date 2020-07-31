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
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="projectinput2">Nama</label>
                                    <input class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <p>
                                            <b>{{ $errors->first('name') }}</b>
                                        </p>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Telp</label>
                                    <input class="form-control {{$errors->has('telp')?'is-invalid':''}}" name="telp">
                                    @if ($errors->has('telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <p>
                                            <b>{{ $errors->first('telp') }}</b>
                                        </p>
                                    </span>
                                    @endif
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
                                    <label for="projectinput2">Tanggal</label>
                                    <div class='input-group mb-3'>
                                        <input class="form-control {{$errors->has('date')?'is-invalid':''}} tanggal"
                                            readonly type="text" value="{{ old('date') }}" name="date" id="tanggal"
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


                                <div class="form-group">
                                    <label>Jam</label>
                                    <div class="input-group entry mt-1" id="time">
                                        <select name="hour[]" class="form-control" id="select-hour">
                                            {{-- @foreach ($hours as $hour)
                                            <option value="{{ $hour->id }}">{{ $hour->hour }}</option>
                                            @endforeach --}}
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

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="projectinput2">Pilih Kursi</label>
                                    <div>
                                        <label>
                                            <input type="radio" name="test" value="small" checked>
                                            <img src="{{ asset('uploads/seat.png') }}" width="50" height="50">
                                          </label>
                                    </div>
                                    
                                    <input class="form-control {{$errors->has('name')?'is-invalid':''}}" name="name">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <p>
                                            <b>{{ $errors->first('name') }}</b>
                                        </p>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Telp</label>
                                    <input class="form-control {{$errors->has('telp')?'is-invalid':''}}" name="telp">
                                    @if ($errors->has('telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <p>
                                            <b>{{ $errors->first('telp') }}</b>
                                        </p>
                                    </span>
                                    @endif
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
                                    <label for="projectinput2">Tanggal</label>
                                    <div class='input-group mb-3'>
                                        <input class="form-control {{$errors->has('date')?'is-invalid':''}} tanggal"
                                            type="text" value="{{ old('date') }}" name="date" id="tanggal"
                                            readonly="readonly" style="cursor: pointer; background: white">
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


                                <div class="form-group">
                                    <label>Jam</label>
                                    <div class="input-group entry mt-1" id="time">
                                        <select name="hour[]" class="form-control">
                                            
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
                                    <input class="form-control {{$errors->has('add_hour')?'is-invalid':''}}"
                                        type="number" name="add_hour">
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
    var dateToday = new Date();

	$('.tanggal').datepicker({
		//multidate: true,
		format: 'dd-mm-yyyy',
        todayHighlight: true,
        clearBtn: true,
        toggleActive: true,
        startDate: new Date(),
        onSelect: function(formattedDate, date, inst) {
            console.log(date);
            //$(inst.el).trigger('change');
        }
    });
    
</script>


<script>
    const url = '{{ config('app.url') }}';
    const selectHour = document.querySelector('#select-hour');
    let op = ``;
    $('.tanggal').on('change', async function() {
        const date = this.value;
        const data = await fetchHour(date);
        data.map(d => op += show(d));
        selectHour.innerHTML = op;
    });

    function fetchHour(date){
        return fetch(url+'travel/date/'+date+'/hour').then(res => res.json()).then(res => res)
    }

    function show(d){
        return `<option value="${d.id}">${d.hour}</option>`
    }
</script>
{{-- 
<script>
    selectHour = document.querySelector('#select-hour')
    console.log(selectHour.value);
</script> --}}

@endsection