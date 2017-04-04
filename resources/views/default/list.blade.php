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
                            <a href="{{route($entity::Single.'_add')}}" class="btn btn-success">+{{trans('Add a')}} {{ucfirst(__('messages.'.$entity::Single))}}</a>
                        </div>
                        <table class="table table-bordered table-responsive table-striped">
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
                            <tbody>
                            @forelse($list as $item)
                                @include('default.list_row',['item'=>$item, 'fields'=>$entity::$_list])

                                @empty
                                <tr>
                                    <td colspan="{{count($entity::$_list)+1}}">There's no {{$entity::Single}} recorded on the system</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="{{count($entity::$_list)+1}}">{{$list->links()}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
