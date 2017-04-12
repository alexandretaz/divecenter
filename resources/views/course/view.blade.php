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
                        <p><b><p>{{__('course.field.out_of_catalog')}}</b>: {{$entity->deleted_at}}</p></p>
                    </div>
                    @include ('course.requisites',['course'=>$entity])
                    @include('course.schedule',['dates'=>$entity->events]);
                </div>
            </div>
        </div>
    </div>
@endsection