<div class="panel-group" id="requisites-group" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="courseRequisite">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#schedule" href="#courseRequisiteTableArea" aria-expanded="true" aria-controls="courseRequisiteTableArea">
                    {{ucfirst(__('course.requisites'))}}
                </a>
            </h4>
        </div>
        <div id="courseRequisiteTableArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="courseRequisite">
            <div class="panel-body">
                <a href="#" class="btn btn-primary">+ {{ucfirst(__('course.requisite.add'))}}</a>
                <div class="hidden-md">
                    <table class="table-responsive table-striped table-bordered table">
                        <thead>
                        <tr>
                            <th>{{ucfirst(__('course.requisite.kind'))}}</th>
                            <th>{{ucfirst(__('course.requisite.value'))}}</th>
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