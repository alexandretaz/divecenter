@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{__('course.message.heading')}}</h1></div>

                    <div class="panel-body">
                        <h2>
                            @if(empty($entity->id))
                                {{__('course.message.form_creation_description')}}
                                @else

                            @endif
                        </h2>
                        <form method = "post"
                        @if(empty($entity->id))
                            action = "{{route('course_create')}}"
                        @else
                            action = "{{route('course_update')}}"
                        @endif
                        >
                            {{csrf_field()}}
                            <div class="col-md-11 col-md-offset-1 col-xs-12">
                        <div class="form-group form-horizontal">
                            <label for="courseLabel">{{__("course.course")}}*
                            <input type="text" id="courseLabel" name="course" class="form-control" @if(!empty($entity->course)) value="{{$entity->course}}" @endif required="required">
                            </label>
                        </div>

                            <div class="form-group form-horizontal">
                                <label for="courseLevel">{{__("course.level")}}*
                                    <select name="level" class="form-control">
                                        <option value="1">{{__('Entry Level (with professional supervision)')}}</option>
                                        <option value="2">{{__('Entry Level (without professional supervision)')}}</option>
                                        <option value="3">{{__('Advanced Level (without deep limit ampliation ) - Adventure Diver')}}</option>
                                        <option value="4">{{__('Advanced Level - Advanced Diver')}}</option>
                                        <option value="5">{{__('Rescue Diver')}}</option>
                                        <option value="6">{{__('Specialty Diver')}}</option>
                                        <option value="7">{{__('Professional Diver')}}</option>
                                    </select>
                                </label>
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
                            <label for="course_prerequisites"> {{__('course.pre_req')}}
                                <fieldset class="form-group" id = "course_prerequisites">
                                    <a href="#" id="addPreReq" class="btn btn-sm btn-default">+{{__('course.add_req')}}</a>

                                </fieldset>
                            </label>
                             </div>
                                <div class="form-group">
                                    <label for="description">
                                        {{__('course.description')}}
                                        <textarea class="form-control htmlinput" cols="70" name="description" id="description">{{__('course.description')}}</textarea>
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
@section ('body_scripts')
<script>
indexPreq = 0;
    $(document).ready(function(){
        $("#addPreReq").on('click', function(){
            $.get('{{route('course_get_req',['type'=>'course'])}}/'+indexPreq, function(data){
                $("#course_prerequisites").prepend(data);
            })
        })
    });
</script>
@endsection