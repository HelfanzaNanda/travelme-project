@extends('templates.owner')
@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Tabel Data Penumpang</h3>
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

        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span> </button>
            <h3 class="text-warning"><i class="fa fa-remove"></i> Error</h3> {{ $message }}
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penumpang</th>
                                <th>Perjalanan</th>
                                <th>Total Harga / Kursi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key => $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->user->name}}</td>
                                <td>{{$data->departure->from .' -> '. $data->departure->destination}}</td>
                                <td>{{'Rp.'.number_format($data->total_price)}}/{{$data->total_seat}} Kursi</td>

                                @if ($data->verify == '2' && $data->status == 'none')
                                <td><span class="badge badge-success">sudah di konfirmasi dan belum dibayarkan</span></td>
                                @elseif($data->verify == '2' && $data->status == 'pending')
                                <td><span class="badge badge-success">sudah di konfirmasi dan sudah dibayarkan</span></td>
                                @elseif ($data->verify == '0')
                                <td><span class="badge badge-danger">pesanan di tolak</span></td>
                                @else
                                <td><span class="badge badge-warning">belum di konfirmasi</span></td>
                                @endif

                                @if (count($drivers) > 0)
                                <td>
                                    {{-- <a href="{{route('owner.user.show', $data->id)}}" class="btn btn-info
                                    btn-sm"><i class="mdi mdi-eye"></i></a> --}}
                                    <a href="" class="btn btn-info btn-sm" data-toggle="collapse"
                                        data-target="#collapse{{$data->id}}" aria-expanded="false"
                                        aria-controls="collapseA1">
                                        <i class="mdi mdi-eye"></i></a>
                                    @if ($data->verify == '1')
                                    <a href="{{ route('owner.user.confirmed', $data->id) }}" 
                                        onclick="return confirm('apakah anda yakin ?')"
                                        class="btn btn-warning btn-sm" >Konfirmasi</a>

                                    <a href="" data-toggle="modal" data-target="#declineModal{{ $data->id }}"
                                        class="btn btn-danger btn-sm">
                                        Tolak</a>
                                    @else
                                    @if ($data->verify == '2' && $data->status == 'pending' && $data->driver_id == null)
                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#confirmedModal{{ $data->id }}" data-id="{{ $data->id }}" id="get-driver">Pilih Sopir</a>
                                    @else
                                        
                                    @endif
                                    @endif
                                </td>
                                @else
                                <td><span class="badge badge-danger">silahkan tambahkan driver dahulu</span></td>
                                @endif

                                <div class="modal fade" id="confirmedModal{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pilih Driver yang ada di
                                                    Lokasi</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('owner.user.choosedriver', $data->id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <div class="modal-body">
                                                    <div class="form-group">

                                                        <select name="driver_id" class="form-control"></select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" 
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" id="btn-konfirmasi">Konfirmasi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="declineModal{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Menolak Karena Apa?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('owner.user.decline', $data->id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        @php($reasons = ['--- Pilih ---','Terlalu Jauh', 'Yang Lain'])
                                                        <select class="form-control" id="select-reason">
                                                            @for ($i = 0; $i < count($reasons); $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ $i == 0 ? 'selected disabled' : '' }}>
                                                                    {{ $reasons[$i] }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="reason"
                                                            style="display: none;" name="reason">
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control" id="additional-price"
                                                        style="display: none;" name="additional_price">
                                                            <option value="0" selected disabled>-- Pilih Tambahan Harga --</option>
                                                            <option value="10000">Rp . {{ number_format(10000) }}</option>
                                                            <option value="20000">Rp . {{ number_format(20000) }}</option>
                                                            <option value="30000">Rp . {{ number_format(30000) }}</option>
                                                        </select>
                                                        {{-- <input type="text" class="form-control" id="additional-price"
                                                            style="display: none;" name="additional_price"> --}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr id="collapse{{$data->id}}" class="collapse" aria-labelledby="headingAOne">
                                <td>#</td>
                                <td colspan="4">
                                    <div>
                                        <p>Lokasi Penjemputan : {{$data->pickup_point}}</p>
                                        <p>Lokasi Tujuan : {{$data->destination_point}}</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Tanggal :{{\Carbon\Carbon::parse($data->date)->format('d m Y')}}</p>
                                                <p>Jam :{{ \Carbon\carbon::parse($data->hour)->format('H:i') }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Driver :  {{ $data->driver_id == null ? 'driver belum di pilih' : $data->driver['name'] }}</p>
                                                <p>Mobil : {{ $data->car_id == null ? 'mobil belum di pilih' : $data->car['number_plate']}}</p>
                                            </div>
                                        </div>
                                        
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
    const selectReason = document.querySelectorAll("#select-reason")
    const reason = document.querySelectorAll("#reason")
    const additionalPrice = document.querySelectorAll("#additional-price")

    selectReason.forEach((s, i) => {
        s.addEventListener('change', function () {
        if (this.value == 1) {
            reason[i].value = ''
            reason[i].style.display = 'none'

            //additionalPrice.value = ''
            additionalPrice[i].style.display = ''
            // additionalPrice.placeholder = 'Masukkan Biaya Tambahan'
            // additionalPrice.type = 'tel'
            // additionalPrice.addEventListener('input', handle, true)

        } else if (this.value == 2) {
            additionalPrice[i].value = ''
            additionalPrice[i].style.display = 'none'

            reason[i].value = ''
            reason[i].style.display = ''

            reason[i].placeholder = 'Masukkan Alasan Di Tolak'
            reason[i].type = 'text'
        }
    });
    })
</script>

<script>
    const user = document.querySelectorAll('#get-driver');
    const driver = document.querySelectorAll('select[name="driver_id"]');
    const konfirmasi = document.querySelectorAll('#btn-konfirmasi');

    const url = '{{ config('app.url') }}';
    user.forEach(u => {
        const id = u.dataset.id;
        let op = ``;
        u.addEventListener('click', async function () {
            const data = await getData(id);
            data.map(d => op += show(d));
            driver.forEach(driv => {
                driv.innerHTML = op;
            });
        });
    })
   

    function getData(id) {
      return  fetch(url+'travel/user/'+id+'/driver')
        .then(res => res.json())
        .then(res => res)  
    }

    function show(d){
        return `<option value="${d.id}">${d.name}</option>`
    }
   
</script>
@endsection
