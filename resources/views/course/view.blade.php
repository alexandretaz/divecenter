@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{__('course.view_about')}} {{$entity->course}}</div>

                    <div class="panel-body">
                        <p><b>{{__('course.field.id')}}</b>: {{$entity->id}}</p>
                        <p><b>{{__('course.field.name')}}</b>: {{$entity->course}}</p>
                        <p><b>{{__('course.field.cost')}}</b>: {{$entity->cost}}</p>
                        <p><b>{{__('course.field.price')}}</b>: {{$entity->price}}</p>
                        <p><b>{{__('course.field.description')}}</b>: {{$entity->description}}</p>
                        <p><b>{{__('course.field.created')}}</b>: {{$entity->created_at}}</p>
                        <p><b>{{__('course.field.last_change')}}</b>: {{$entity->updated_at}}</p>
                        <p><b>{{__('course.field.out_of_catalog')}}</b>: {{$entity->deleted_at}}</p>
                    </div>
                    @include ('course.requisites',['course'=>$entity])
                    @include('course.schedule',['dates'=>$entity->next_dates])
                </div>
            </div>
        </div>
    </div>
@endsection
@section('body_scripts')
<script>
    indexPreq = 0;
    $(document).ready( function(){
            $(".addPreReq").on('click', function(){
                id = $(this).attr('id');
                courseId = $(this).attr('data-id');
                type = null;
                console.dir($(this));
                if(id=='coursePreq'){
                    type='course';
                }
                else {
                    if(id=='agePreq') {
                        type='age';
                    }
                    if(id=='minDivesPreq'){
                        type="minDives"
                    }
                }
                url ='{{route('course_get_req',['type'=>'type'])}}/'+indexPreq+'/'+courseId;
                url =  url.replace('type', type);

                $.get(url, function(data){
                    $("#modalTitle").html('{{ucwords(__('Add Course Requisites'))}}');
                    $("#appModalBody").html(data);

                    $('#appModal').modal();
                })
                $("#btnModalAction").on('click', function() {
                    valType = $("#kind0Preq").val();
                    valValue = $("#kind0Value").val();
                    vCourseId = $("#CourseIdPreq").val();
                    $.ajax({
                        method: "POST",
                        url: "/course/requisites/add",
                        data: { type: valType, value: valValue, course_id:vCourseId, _token:window.Laravel.csrfToken }
                    })
                        .done(function( response ) {
                            $('#appModal').modal('hide');
                            $('#bodyCourseRequisites').append('<tr><td>'+response.requisite_type+'</td><td>'+response.requisite_value+'</td><td>&nbsp</td></tr>');
                            window.location.reload();
                        })
                        .fail(function(){
                            $("#courseRequisite").prepend('<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <h4>{{ucfirst(__('course.error.creating.requisite'))}}</h4> <p>{{ucfirst(__('course.error.creating.requisite.message'))}}</p> <p> <button type="button" class="btn btn-danger">{{ucfirst(__('close this message'))}}</button></p> </div>')
                        });
                    return false;


                })
            });
            $('.btn-delete-req').on('click', function(){
                $.ajax({
                    method: "POST",
                    url: "/course/requisites/delete/",
                    data: { type: valType, value: valValue, course_id:vCourseId, _token:window.Laravel.csrfToken }
                })
                    .done(function( response ) {
                        $('#appModal').modal('hide');
                        $('#bodyCourseRequisites').append('<tr><td>'+response.requisite_type+'</td><td>'+response.requisite_value+'</td><td>&nbsp</td></tr>');
                        window.location.reload();
                    })
                    .fail(function(){
                        $("#courseRequisite").prepend('<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <h4>{{ucfirst(__('course.error.creating.requisite'))}}</h4> <p>{{ucfirst(__('course.error.creating.requisite.message'))}}</p> <p> <button type="button" class="btn btn-danger">{{ucfirst(__('close this message'))}}</button></p> </div>')
                    });
            });

        }
    );
</script>
@endsection