@if($type=='course')
    <div class="form-group">
        <input type="hidden" name="preq[{{$index}}][kind]" value="certification" id="kind{{$index}}Preq">
        <label for = "cursoPrereq{{$index}}">
            {{__('course.preq.labels.course')}}
            <select name="preq[{{$index}}][value]" class="form-control" id="kind{{$index}}Value">
                @foreach(App\Course::all() as $course)
                    <option value="{{$course->id}}">{{$course->course}}</option>
                    @endforeach
            </select>
        </label>
    </div>
    @elseif($type=='age')
    <div class="form-group">
        <input type="hidden" name="preq[{{$index}}][kind]" id="kind{{$index}}Preq" value="age">
        <label for = "cursoPrereq{{$index}}">
            {{__('course.preq.labels.age')}}
            <input type="number" min="0" step="1" name="preq[{{$index}}][value]" id="kind{{$index}}Value" class="form-control">

        </label>
    </div>
    @elseif($type=='minDives')
    <input type="hidden" name="preq[{{$index}}][kind]" value="minDives" id="kind{{$index}}Preq">
    <label for = "cursoPrereq{{$index}}">
        {{__('course.preq.minDives')}}
        <input type="number" min="0" step="1" name="preq[{{$index}}][value]" class="form-control" id="kind{{$index}}Value">

    </label>
    </div>
@endif
@if(isset($id) && !empty($id))
    <input type="hidden" name="course_id" value="{{(int)$id}}" id="CourseIdPreq">
@endif
