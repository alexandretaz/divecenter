<tr>
    @foreach($fields as $field)
        <?php $fieldName = $field['name']; ?>
        <td>{{$item->$fieldName}}</td>
    @endforeach
    <td><!-- Split button -->
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Actions</button>
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{route($routes['view'])}}">{{ucfirst(__('messages.view'))}}</a></li>
                <li><a href="{{route($routes['edit'])}}">{{ucfirst(__('messages.edit'))}}</a></li>
                @if(isset($routes['schedule']))
                <li><a href="{{route($routes['schedule'])}}">{{ucfirst(__('messages.schedule'))}}</a></li>
                @endif
                <li role="separator" class="divider"></li>
                <li><a href="{{route($routes['delete'])}}">{{ucfirst(__('messages.delete'))}}</a></li>
            </ul>
        </div></td>
</tr>