<tr>
    @foreach($fields as $field)
        <?php $fieldName = $field['name']; ?>
        <td>{{$item->$fieldName}}</td>
    @endforeach
    <td>Actions</td>
</tr>