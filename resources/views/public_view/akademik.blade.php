@extends('layouts.admin')

@section('title', 'Jadwal Akademik')

@section('head')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'today',
            center: 'title',
            right: 'prev,next'
          },
          events : [
                @foreach($akademik as $aka)
                {
                    title : '{{ $aka->title }}',
                    start : '{{ $aka->start }}',
                    end   : '{{ $aka->end }}',
                    color : '{{ $aka->color }}'
                },
                @endforeach
            ],
            
            eventClick: function(events, element) {
                
                var dateStart = events.event.start
                var dateEnd = events.event.end
                
                // Display the modal and set the values to the event values.
                $('.akademikModal').modal('show');
                $('.akademikModal').find('#title').val(events.event.title);
                $('.akademikModal').find('#starts-at').val(dateStart.getFullYear()+"-"+(dateStart.getMonth()+1)+"-"+dateStart.getDate());
                $('.akademikModal').find('#ends-at').val(dateEnd.getFullYear()+"-"+(dateEnd.getMonth()+1)+"-"+dateEnd.getDate());

            },
            editable: true,
        
        });
        calendar.render();
      });
</script>
    <style>
        .fc-event{
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }
        .fc-toolbar-title{
            color: black;
            font-weight: bold;
        }
        .fc .fc-button-primary{
            background-color: blue;
            border-color: rgb(134, 134, 219);
            color: white;
        }
        .fc .fc-button-primary:disabled{
            background-color: rgb(55, 55, 255);
            border-color: rgb(134, 134, 219);
            color: white;
        }
        .fc .fc-button-primary:hover{
            background-color: rgb(55, 55, 255);
            border-color: rgb(134, 134, 219);
            color: white;
        }

        :root{
            --fc-button-active-bg-color: rgb(55, 55, 255);
            --fc-button-active-border-color: rgb(134, 134, 219);
        }

    </style>
@endsection
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jadwal Akademik </h1>
            <div id='calendar'></div>
    {{-- modal --}}
    <div class="modal akademikModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Jadwal Akademik</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title">
                <label for="starts-at">Mulai</label>
                <input type="text" class="form-control" id="starts-at">
                <label for="ands-at">Selesai</label>
                <input type="text" class="form-control" id="ends-at">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

</div>


@endsection

@section('script')

@endsection