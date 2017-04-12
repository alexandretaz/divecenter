<div class="panel-group" id="schedule" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="courseSchedule">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#schedule" href="#courseScheduleTableArea" aria-expanded="true" aria-controls="courseScheduleTableArea">
                    {{__('course.schedule.next')}}
                </a>
            </h4>
        </div>
        <div id="courseScheduleTableArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="courseSchedule">
            <div class="panel-body">
                <a href="#" class="btn btn-primary">+ {{__('course.schedule.add')}}</a>
                <div class="hidden-md">
                    <table class="table-responsive table-striped table-bordered table">
                        <thead>
                        <tr>
                            <th>{{ucfirst(__('messages.begin'))}}</th>
                            <th>{{ucfirst(__('messages.end'))}}</th>
                            <th>{{ucfirst(__('course.instructors'))}}</th>
                            <th>{{ucfirst(__('messages.prices'))}}</th>
                            <th>{{ucfirst(__('messages.action'))}}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
    </div>
</div>