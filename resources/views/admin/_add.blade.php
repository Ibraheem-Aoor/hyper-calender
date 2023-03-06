<div class="container">
    <div class="row">
        <div class="card tab-card">
            <div class="card-header bg-warning tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">{{ __('Event') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">{{ __('Reminder') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">{{ __('Task') }}</a>
                    </li>
                </ul>
                <button type="button" id="calender-add-form-close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                    @include('admin.event._create')
                </div>
                <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                    @include('admin.reminder._create')
                </div>
                <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                    @include('admin.task._create')
                </div>
            </div>
        </div>
    </div>
</div>
