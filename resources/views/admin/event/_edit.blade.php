{{  Form::model($event,['route'=>['event.update',$event->id],'method'=>'patch','id'=>'edit-form']) }}
<div class="modal-header bg-warning py-2">
    <h5 class="modal-title" id="exampleEditModalLabel">{{ __('Edit Event') }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('title', __('Title'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::text('title', null, ['placeholder' => 'Enter Title','class'=>'form-control form-control-sm']) }}
            </div>
            <div class="form-group">
                {{ Form::label('start_date', __('Start Date'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::text('start_date', null, ['placeholder' => 'Select Start Date','class'=>'form-control form-control-sm datePicker']) }}
            </div>
            <div class="form-group">
                {{ Form::label('end_date', __('End Date'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::text('end_date', null, ['placeholder' => 'Enter End Date','class'=>'form-control form-control-sm datePicker']) }}
            </div>
            <div class="form-group">
                {{ Form::label('guests', __('Guests'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::text('guests', null, ['placeholder' => 'Enter Guest','class'=>'form-control form-control-sm']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('repeat_id', __('Repeat'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::select('repeat_id',$repository->repeats(),null,['placeholder' => 'Do not repeat','class'=>'form-control form-control-sm']) }}
            </div>
            <div class="form-group">
                <div class="bootstrap-timepicker">
                    {{ Form::label('start_time', __('Start Time'),['class'=>'col-form-label col-form-label-sm']) }}
                    {{ Form::text('start_time', null, ['placeholder' => 'Enter Time','class'=>'form-control form-control-sm timepicker']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="bootstrap-timepicker">
                    {{ Form::label('end_time', __('End Time'),['class'=>'col-form-label col-form-label-sm']) }}
                    {{ Form::text('end_time', null, ['placeholder' => 'Enter Time','class'=>'form-control form-control-sm timepicker']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('locations', __('Locations'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::text('locations', null, ['placeholder' => 'Enter Location','class'=>'form-control form-control-sm']) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('description', __('Description'),['class'=>'col-form-label col-form-label-sm']) }}
                {{ Form::textarea('description', null, ['placeholder' => 'Enter Description','class'=>'form-control form-control-sm']) }}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer d-flex justify-content-center">
    <button type="submit" class="btn btn-primary btn-sm">{{ __('Save changes') }}</button>
    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
</div>
{{ Form::close() }}
