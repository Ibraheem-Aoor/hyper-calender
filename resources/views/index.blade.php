@extends('layouts.admin')

@section('title','Dashboard One')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Calendar') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Calendar') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar">
                                <!-- The calendar will appeared here -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add to Calendar') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('dist/img/fcs.gif') }}" alt="" id="loader">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary">{{ __('Save changes') }}</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: '{{ today() }}',
                navLinks: false, // can click day/week names to navigate views
                businessHours: false, // display business hours
                editable: true,
                selectable: true,
                events: [
                        @foreach($events as $event)
                    {
                        id          : '{{ $event->id }}',
                        title       : '{{ $event->title }}',
                        start       : '{{ $event->start_date ? $event->start_date->format('Y-m-d') : '' }}T{{ $event->start_time ? $event->start_time->format('H:i:s') : '' }}',
                        end         : '{{ $event->end_date ? $event->end_date->format('Y-m-d') : '' }}T{{ $event->start_time ? $event->start_time->format('H:i:s') : '' }}',
                        color       : '#f56954',
                        borderColor : '#f56954',
                        type        : 'event',
                    },
                        @endforeach
                        @foreach($reminders as $reminder)
                    {
                        id          : '{{ $reminder->id }}',
                        title       : '{{ $reminder->title }}',
                        start       : '{{ $reminder->date->format('Y-m-d') }}{{ $reminder->is_all_day ?'':'T'.$reminder->date->format('H:i:s') }}',
                        color       : '#f39c12',
                        borderColor : '#f39c12',
                        allDay      : {{ $reminder->is_all_day ? 'true' : 'false' }},
                        type        : 'reminder'
                    },
                        @endforeach
                        @foreach($tasks as $task)
                    {
                        id          : '{{ $task->id }}',
                        title       : '{{ $task->title }}',
                        start       : '{{ $task->date->format('Y-m-d') }}{{ $task->is_all_day ?'':'T'.$task->date->format('H:i:s') }}',
                        color       : '#0073b7',
                        borderColor : '#0073b7',
                        allDay      : {{ $task->is_all_day ? 'true' : 'false' }},
                        type        : 'task'
                    },
                        @endforeach
                ],

                // Popup edit form for task/reminder/event
                eventClick: function(info){
                    $('#exampleModal').modal('show')
                    var csrf = "{{ csrf_token() }}";
                    $.ajax({
                        url : "{{ route('calendar-event') }}",
                        data: {_token:csrf,id:info.event.id,type:info.event.extendedProps.type},
                        type: "POST",
                        beforeSend: function(){
                            $("#loader").show();
                        }
                    }).done(function(e){
                        $("#modal-content").html(e);
                        /** load date picker in edit form */
                        $('.datePicker').datepicker({
                            format : 'yyyy-mm-dd',
                            autoclose : true
                        })
                        /** load time picker in edit form */
                        $('.timepicker').timepicker({
                            showInputs: false,
                            showMeridian: false,
                            showSeconds: true
                        })
                    })
                },
            });

            calendar.render();

            /** Activate add new modal after clicking previous button */
            $('.fc-prev-button').click(function(){
                addNewModal();
            });
            /** Activate add new modal after clicking next button */
            $('.fc-next-button').click(function(){
                addNewModal()
            });
            /** Activate add new modal after clicking today button */
            $('.fc-today-button').click(function(){
                addNewModal()
            });
            /** Activate add new modal after clicking month button */
            $('.fc-month-button').click(function(){
                addNewModal()
            });

            addNewModal()
        });

    </script>

    <script>
        $(".nano").nanoScroller({
            preventPageScrolling: true,
        });
    </script>

    <script>
        function addNewModal(){
            // Popup modal for creating new task/reminder/event
            $(".fc-daygrid-day-number").click(function(){
                var date = $(this).data('date')
                var csrf = "{{ csrf_token() }}";
                $('#exampleModal').modal('show')
                $.ajax({
                    url : "{{ route('calendar-add') }}",
                    data: {_token:csrf,date:date},
                    type: "POST",
                    beforeSend: function(){
                        $("#loader").show();
                    }
                }).done(function(e){
                    $("#modal-content").html(e);
                    /** load date picker in edit form */
                    $('.datePicker').datepicker({
                        format : 'yyyy-mm-dd',
                        autoclose : true
                    })
                    /** load time picker in edit form */
                    $('.timepicker').timepicker({
                        showInputs: false,
                        showMeridian: false,
                        showSeconds: true
                    })
                })
            })

            $(".fc-daygrid-day-number").css('cursor','pointer');
            $(".fc-event-container").css('cursor','pointer');
        }
    </script>

@stop
