@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{__('schedule.course.messages.heading.main')}}</h1></div>

                <div class="panel-body">
                    <h2>
                        @if(empty($entity->id))
                        {{__('schedule.course.messages.heading.new')}} {{__($course->course)}}
                        @else

                        @endif
                    </h2>
                    <form method = "post"
                          @if(empty($entity->id))
                        action = "{{route('new_schedule_course')}}"
                        @else
                        action = "{{route('edit_course_schedule')}}"
                        @endif
                        >
                        {{csrf_field()}}
                        <div class="col-md-11 col-md-offset-1 col-xs-12">
                            <div class="form-group form-horizontal">
                                <label for="courseInitialDate">{{__('schedule.begins')}}
                                    <input type="datetime-local" id="courseInitialDate" name="begins" class="form-control" @if(!empty($entity->begins)) value="{{$entity->begins}}" @endif required="required">
                                </label>
                            </div>
                            <div class="form-group form-horizontal">
                                <label for="courseFinalDate">{{__('schedule.ends')}}*
                                    <input type="datetime-local" id="courseFinalDate" name="ends" class="form-control" @if(!empty($entity->ends)) value="{{$entity->ends}}" @endif required="required">
                                </label>
                                <input type="hidden" name="eventable_type" value="{{ucfirst($kind)}}">
                                <input type="hidden" name="eventable_id" value="{{$course->id}}">
                            </div>
                            <div class="form-group form-horizontal">
                                <label for="cost">
                                    {{__('course.cost')}}*
                                    <input type="number" class="form-control" min="0" step="0.01"  required="required" name="cost" id="cost">
                                </label>
                            </div>
                            <div class="form-group form-horizontal">
                                <label for="price">
                                    {{__('course.price')}}*
                                    <input type="number" class="form-control" min="0" step="0.01"  required="required" name="price" id="price">
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="event_prices"> {{__('schedule.prices.label')}}
                                    <fieldset class="form-group" id = "event_prices">
                                        <!-- Single button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{__('schedule.prices.main')}}<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="addPrice" id="coursePreq">{{__('schedule.prices.add')}}</a></li>
                                            </ul>
                                        </div>

                                    </fieldset>
                                    <input type="hidden" name="prices" value="{}">
                                    <input type="hidden" name="model" value="App\Course">
                                </label>
                            </div>

                            <button type="submit" class="button btn btn-success">{{__('Save it!')}}</button>
                            <button type="reset" class="button btn btn-danger">{{__('Clear it!')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal_content')
    @include('schedule.prices')
@endsection
@section ('body_scripts')
<script>
    indexPrice = 0;
    $(document).ready(function(){
        $(".addPrice").on('click', function(){
            id = $(this).attr('id');
            type = null;
            $("#appModal").modal();
        })
    });
</script>
@endsection