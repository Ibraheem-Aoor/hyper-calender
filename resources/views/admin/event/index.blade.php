@extends('layouts.admin')

@section('title','Add Event')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Events') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Add New Event') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="pl-3">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus-circle"></i> Add An Event</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover text-secondary">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#{{ __('ID') }}</th>
                                        <th class="text-center">{{ __('Title') }}</th>
                                        <th class="text-center">{{ __('Time')}}</th>
                                        <th class="text-center">{{ __('Details') }}</th>
                                        <th class="text-center">{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td class="text-center"> {{ $event->id }}</td>
                                            <td class=""> {{ $event->title }} </td>
                                            <td class="">
                                                <b>Start:</b> {{ panDate($event->start_date) }} {{ $event->start_time ? panTime($event->start_time) : '' }}<br>
                                                <b>End:</b> {{ $event->end_date ? panDate($event->end_date) : '' }} {{ $event->end_time ? panTime($event->end_time) : '' }}
                                                <br>
                                                <span  class="text-black-50 text-center"><small><em>Repeat: {{ $event->repeat->name ?? 'Do not repeat' }}</em></small></span>
                                            </td>
                                            <td class="">
                                                Guest: {{ $event->guests }}<br>
                                                Location: {{ $event->locations }}<br>
                                                {{ $event->description }}
                                            </td>
                                            <td class="text-center">
                                                {{ Form::open(['route'=>['event.delete',$event->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$event->id}})"><i class="fas fa-edit"></i></button>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fas fa-trash"></i>
                                                </button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <div class="col-md-12">
                <div class="card-body">
                    <div class="text-center">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- modal for add event starts here-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add New Event') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('admin.event._create')
            </div>
        </div>
    </div>
    <!-- modal for add event ends here -->


    <!-- Edit Modal -->
    <div class="modal fade" id="exampleEditModal" tabindex="-1" aria-labelledby="exampleEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
                <!-- Edit form will appeared here -->
                <img src="{{ asset('dist/img/fcs.gif') }}" alt="" id="loader">
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this event?');
            return !!x;
        }
    </script>
    <script>
        function loadEditForm(id){
            var token = "{{ csrf_token() }}";
            $.ajax({
                url:"{{ route('event.edit') }}",
                data: {_token:token,id:id},
                type: 'get',
                beforeSend: function(){
                    $("#loader").show();
                }
            }).done(function(e){
                $("#edit-form").remove();
                $("#loader").hide();
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
        }
    </script>
@stop
