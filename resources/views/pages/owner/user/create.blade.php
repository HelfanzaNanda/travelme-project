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
                <form class="form" method="post" action="{{route('owner.user.store')}}">
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
                                    <input class="form-control {{$errors->has('telp')?'is-invalid':''}}" name="telp" type="tel">
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
                                    <select name="departure_id" class="form-control" id="select-departure">
                                        @foreach ($departures as $departure)
                                        <option value="{{ $departure->id }}">{{ $departure->destination }}
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


                                <div class="form-group" id="jam" style="display: none">
                                    <label>Jam</label>
                                    <div class="input-group entry mt-1" id="time">
                                        <select name="hour" class="form-control" id="select-hour"></select>
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
                                    <label for="rtypes" class="">Pilih Kursi</label>
                                    <div class="row d-flex justify-content-end" id="rb-seat"></div>

                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Alamat Penjemputan</label>
                                    <input class="form-control {{$errors->has('pickup_point')?'is-invalid':''}}"
                                     name="pickup_point">
                                    @if ($errors->has('pickup_point'))
                                    <span class="invalid-feedback" role="alert">
                                        <p>
                                            <b>{{ $errors->first('pickup_point') }}</b>
                                        </p>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="projectinput2">Alamat Tujuan</label>
                                    <input class="form-control {{$errors->has('destination_point')?'is-invalid':''}}"
                                     name="destination_point">
                                    @if ($errors->has('destination_point'))
                                    <span class="invalid-feedback" role="alert">
                                        <p>
                                            <b>{{ $errors->first('destination_point') }}</b>
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
    const jam  = document.querySelector('#jam');
    const departure = document.querySelector('#select-departure');
    const rbSeat = document.querySelector('#rb-seat');
    let d = {};
    let op = ``;
    $('.tanggal').on('change', async function() {
        const date = this.value;
        d = date;
        const data = await fetchHour(date);
        data.map(d => op += show(d));
        jam.style = ''
        selectHour.innerHTML = op;
    });

    function fetchHour(date){
        return fetch(url+'travel/date/'+date+'/hour').then(res => res.json()).then(res => res)
    }

    function show(d){
        return `<option value="${d.id}">${d.hour}</option>`
    }

    let rb = `<div class="form-check col-8">Supir</div>`;
    selectHour.addEventListener('change', async function(){
        const seat = await fetchSeat(selectHour.value, d, departure.value);
        seat.map(s => rb+= setLayoutSeat(s));
        rbSeat.innerHTML = rb;
    });



    function fetchSeat(hour_id, date, departure){
        return fetch(url+'travel/car/fetch/seat', {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                },
                method: 'post',
                credentials: "same-origin",
                body: JSON.stringify({
                    hour_id: hour_id,
                    date: date,
                    departure_id: departure
                })
            })
            .then(res => res.json()).then(res => res)
            .catch(function(error) {
                console.log(error);
            });
    }

    function setLayoutSeat(s){
        let result;
        if(s.status == "available"){
            result = 
            `<div class="form-check col-4">
                <input class="form-check-input" type="radio" name="seats[]" value="${s.id}">
                <img src="{{ asset('uploads/seat.png') }}" width="50" height="50">
            </div>`
        }else{
            result = 
            `<div class="form-check col-4">
                <input class="form-check-input" type="radio" disabled>
                <img src="{{ asset('uploads/seat.png') }}" width="50" height="50">
            </div>`
        }
        return result;
    }
</script>


<script>

</script>
@endsection