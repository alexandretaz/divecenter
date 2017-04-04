@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ucfirst(trans($entity::LIST_NAME))}}</div>

                    <div class="panel-body">
                        <div class="col-md-6 col-xs-12">{{trans('List of All '.$entity::Plural)}}</div>
                        <div class="col-md-6 col-xs-12">
                            <a href="{{route($entity::Single.'_add')}}" class="btn btn-success">+{{trans('Add a')}} {{ucfirst(trans($entity::Single))}}</a>
                        </div>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    @foreach($entity::$_list as $field)
                                    <th>
                                        {{ucfirst($field['label'])}}
                                    </th>
                                    @endforeach
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
