@extends('layouts.admin')

@section('title','Add Reminder')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Reminders') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Add New Reminder') }}</li>
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
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus-circle"></i> Add A Reminder</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover text-secondary">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#{{ __('ID') }}</th>
                                        <th class="text-center">{{ __('Title') }}</th>
                                        <th class="text-center">{{ __('Date') }}</th>
                                        <th class="text-center">{{ __('Time') }}</th>
                                        <th class="text-center">{{ __('Repeat') }}</th>
                                        <th class="text-center">{{ __('Is Done') }}</th>
                                        <th class="text-center">{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reminders as $reminder)
                                        <tr>
                                            <td class="text-center"> {{ $reminder->id }}</td>
                                            <td class="text-center"> {{ $reminder->title }} </td>
                                            <td class="text-center"> {{ panDate($reminder->date) }} </td>
                                            <td class="text-center">
                                                @if($reminder->is_all_day == 1)
                                                {{ __('All Day') }}
                                                @else
                                                    {{ $reminder->time ? panTime($reminder->time) : '' }}
                                                @endif </td>
                                            <td class="text-center">
                                                {{ $reminder->repeat->name ?? 'Do not repeat' }}
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" name="is_done" {{ $reminder->is_done ? 'checked' : '' }} onchange="doDone({{$reminder->id}})">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                {{ Form::open(['route'=>['reminder.delete',$reminder->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$reminder->id}})"><i class="fas fa-edit"></i></button>
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
                        {{ $reminders->links() }}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!--    modal for add reminder starts here -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add New Reminder') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('admin.reminder._create')
            </div>
        </div>
    </div>
    <!-- modal for add reminder ends here -->


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
            var x = confirm('Are you sure you want to delete this reminder?');
            return !!x;
        }
    </script>
    <script>
        function loadEditForm(id){
            var token = "{{ csrf_token() }}";
            $.ajax({
                url:"{{ route('reminder.edit') }}",
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
    <script>
        function doDone(id){
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('reminder.done') }}",
                data: {_token:token,id:id},
                type: 'POST'
            }).done(function(){
                location.reload();
            })
        }
    </script>
@stop
