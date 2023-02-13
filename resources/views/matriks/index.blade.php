@extends('layout.master')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">

@endsection

@section('content')
<div class="content-wrapper">
<section class="content-header">
    
</section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
    
                        <div id="calendar"></div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')

<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/main.js')}}"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          themeSystem: 'bootstrap',
          events: '/event',
          
        });
        calendar.render();
      });
</script>

@endsection




