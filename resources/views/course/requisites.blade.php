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
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('course.preq.add')}}<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="addPreReq" id="coursePreq" data-id = "{{(int) $course->id}}">{{__('course.preq.course')}}</a></li>
                        <li><a href="#" class="addPreReq" id="agePreq" data-id = "{{(int) $course->id}}">{{__('course.preq.age')}}</a></li>
                        <li><a href="#" class="addPreReq" id="minDivesPreq" data-id = "{{(int) $course->id}}">{{__('course.preq.mindive')}}</a></li>
                    </ul>
                </div>
                <div class="hidden-md">
                    <table class="table-responsive table-striped table-bordered table">
                        <thead>
                        <tr>
                            <th>{{ucfirst(__('course.requisite.kind'))}}</th>
                            <th>{{ucfirst(__('course.requisite.value'))}}</th>
                            <th>{{ucfirst(__('messages.action'))}}</th>
                        </tr>
                        </thead>
                        <tbody id="bodyCourseRequisites">
                        @forelse($course->requisites as $reqIndex=>$requisite)
                            <tr id="courseReq{{$reqIndex}}">
                                <td>{{ucfirst(__($requisite->requisite_type))}}</td>
                                <td>@if(strcasecmp($requisite->requisite_type, 'age')===0)
                                    {{ucfirst(__($requisite->requisite_value))}}
                                    @endif
                                    @if(strcasecmp($requisite->requisite_type, 'certification')===0)
                                        {{\App\Course::findOrFail($requisite->requisite_value)->course}}
                                    @endif
                                </td>
                                <td>
                                    <button type="button" id="deleteRequisite{{$reqIndex}}}" data-id="{{$reqIndex}}" class="btn btn-delete-req btn-danger">{{ucwords(__('Delete Requisite'))}}</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">{{ucfirst((__('courese,requisite.no_requisite')))}}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
    </div>
</div>