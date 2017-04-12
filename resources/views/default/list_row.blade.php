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
                <li><a href="{{route($routes['view'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.view'))}}</a></li>
                <li><a href="{{route($routes['edit'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.edit'))}}</a></li>
                @if(isset($routes['schedule']))
                <li><a href="{{route($routes['schedule'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.schedule'))}}</a></li>
                @endif
                <li role="separator" class="divider"></li>
                <li><a href="{{route($routes['delete'],['entityId'=>Crypt::encrypt($item->id)])}}">{{ucfirst(__('messages.delete'))}}</a></li>
            </ul>
        </div></td>
</tr>