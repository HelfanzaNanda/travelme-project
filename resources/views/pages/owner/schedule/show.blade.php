@extends('templates.owner')

@section('head')
<link href="{{ asset('assets/plugins/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">Mobil</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Mobil</li>
        </ol>
    </div>
</div>
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-md-12 col-lg-4 col-xlg-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><b>Keberangkatan</b></div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Perjalanan </p>
                        <p>Harga </p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $data->from }} - {{ $data->destination }}</p>
                        <p>{{ 'Rp. '.number_format($data->price) }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Column -->
    <div class="col-md-12 col-lg-8 col-xlg-9">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Jadwal</a>
                </li>
            </ul>

            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection
@section('script')
<script src="{{ asset('assets/plugins/calendar/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/calendar/dist/fullcalendar.min.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/calendar/dist/cal-init.js') }}"></script> --}}
<script>
    /* initialize the calendar
-----------------------------------------------------------------*/

$.getJSON("{{ route('schedule.callendar', $data->id) }}", function(data){
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var className = Array('fc-primary', 'fc-danger', 'fc-default', 'fc-success', 'fc-info', 'fc-warning', 'fc-danger-solid', 'fc-warning-solid', 'fc-success-solid', 'fc-default-solid', 'fc-success-solid', 'fc-primary-solid');

    $calendar = $('#calendar');

    $calendar.fullCalendar({
        editable: false,
        disableDragging: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        eventLimit: false,
        events: data,
        eventRender: function(event, element){
            element.attr('href', 'javascript:void(0);');
            element.click(function() {
                bootbox.alert({
                    message: event.description,
                    title: event.title,
                });
            });
        }

    });
});

</script>
@endsection