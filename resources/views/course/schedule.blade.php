

<div class="panel-group" id="schedule" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="courseSchedule">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#schedule" href="#courseScheduleTableArea" aria-expanded="true" aria-controls="courseScheduleTableArea">
                    {{__('course.schedule.next')}}
                </a>
            </h4>
        </div>
        <div id="courseScheduleTableArea" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="courseSchedule">
            <div class="panel-body">
                <a href="#" class="btn btn-primary">+ {{__('course.schedule.add')}}</a>
                <div class="">
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
                        <tbody>
                        @foreach($dates as $date)
                            <tr>
                                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->begins)->format('d/m/Y H:i')}}</td>
                                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->ends)->format('d/m/Y H:i')}}</td>
                                <td></td>
                                <td>{{$date->price}}</td>
                                <td><ul class="dropdown-menu">
                                        <li><a href="{{route($routes['view'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.view'))}}</a></li>
                                        <li><a href="{{route($routes['edit'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.edit'))}}</a></li>
                                        @if(isset($routes['schedule']))
                                            <li><a href="{{route($routes['schedule'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.schedule'))}}</a></li>
                                        @endif
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{route($routes['delete'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.delete'))}}</a></li>
                                    </ul></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
    </div>
</div>