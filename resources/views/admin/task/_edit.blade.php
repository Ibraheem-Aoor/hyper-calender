{{  Form::model($task,['route'=>['task.update',$task->id],'method'=>'patch','id'=>'edit-form']) }}
<div class="modal-header bg-warning py-2">
    <h5 class="modal-title" id="exampleEditModalLabel">Edit Task</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('title', __('Title'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::text('title', null, ['placeholder' => 'Enter Title','class'=>'form-control form-control-sm' , 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('date', __('Date'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::text('date', null, ['placeholder' => 'Select Date','class'=>'form-control form-control-sm datePicker'  , 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="bootstrap-timepicker">
                    {{ Form::label('time', __('Time'),['class'=>'col-form-label col-form-label-sm']) }}
                    {{ Form::text('time', null, ['placeholder' => 'Enter Time','class'=>'form-control form-control-sm timepicker']) }}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            {{ Form::label('is_all_day', __('Is all Day: '),['class'=>'col-form-label col-form-label-sm']) }}
            <div class="form-check form-check-inline">
                {{ Form::radio('is_all_day', '1' , 1,['class'=>'form-check-input']) }}
                {{ Form::label('is_all_day', __('Yes'),['class'=>'form-check-label col-form-label-sm']) }}
            </div>
            <div class="form-check form-check-inline">
                {{ Form::radio('is_all_day', '0' , 0,['class'=>'form-check-input']) }}
                {{ Form::label('is_all_day', __('No'),['class'=>'form-check-label col-form-label-sm']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', __('Description'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::textarea('description', null, ['placeholder' => 'Enter Description','class'=>'form-control form-control-sm']) }}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-center">
    <button type="submit" class="btn btn-primary btn-sm">{{ __('Save changes') }}</button>
    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
</div>
{{ Form::close() }}
