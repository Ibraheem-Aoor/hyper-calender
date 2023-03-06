@extends('layouts.admin')

@section('title','Add Tasks')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Tasks') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Add New Task') }}</li>
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
                <!-- /.card-header -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="pl-3">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus-circle"></i> Add A Task</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover text-secondary">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#{{__('ID')}}</th>
                                        <th class="text-center">{{ __('Title') }}</th>
                                        <th class="text-center">{{ __('Date') }}</th>
                                        <th class="text-center">{{ __('Time') }}</th>
                                        <th class="text-center">{{ __('Description') }}</th>
                                        <th class="text-center">{{ __('Is Done') }}</th>
                                        <th class="text-center">{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td class="text-center"> {{ $task->id }}</td>
                                            <td class="text-center"> {{ $task->title }} </td>
                                            <td class="text-center"> {{ panDate($task->date) }} </td>
                                            <td class="text-center">
                                                @if($task->is_all_day == 1)
                                                {{ __('All Day') }}
                                                @else
                                                    {{ panTime($task->time) }}
                                                @endif
                                            </td>
                                            <td class="text-center"> {{ $task->description }} </td>
                                            <td class="text-center">
                                                <label class="switch">
                                                    <input type="checkbox" name="is_done" {{ $task->is_done ? 'checked' : '' }} onchange="doDone({{$task->id}})">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                {{ Form::open(['route'=>['task.delete',$task->id],'method'=>'post','onsubmit'=>'return confirmDelete()']) }}
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleEditModal" onclick="loadEditForm({{$task->id}})"><i class="fas fa-edit"></i></button>
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
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!--    modal for add task starts here -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Add New Task') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('admin.task._create')
            </div>
        </div>
    </div>
    <!-- modal for add task ends here -->


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
            var x = confirm('Are you sure you want to delete this task?');
            return !!x;
        }
    </script>
    <script>
        function loadEditForm(id){
            var token = "{{ csrf_token() }}";
            $.ajax({
                url:"{{ route('task.edit') }}",
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
                url: "{{ route('task.done') }}",
                data: {_token:token,id:id},
                type: 'POST',
            }).done(function(){
                location.reload();
            })
        }
    </script>
@stop
