@if($type=='course')
    <div class="form-group">
        <label for = "cursoPrereq{{$index}}">
            {{__('course.preq.labels.course')}}
            <select name="preq[{{$index}}]['id']" class="form-control">
                @foreach(App\Course::all() as $course)
                    <option value="{{$course->id}}">{{$course->course}}</option>
                    @endforeach
            </select>
        </label>
    </div>
    @elseif($type=='age')
    <div class="form-group">
        <label for = "cursoPrereq{{$index}}">
            {{__('course.preq.labels.age')}}
            <input type="number" min="0" step="1" name="preq[{{$index}}]['id']" class="form-control">

        </label>
    </div>
    @elseif($type=='minDives')
    <label for = "cursoPrereq{{$index}}">
        {{__('course.preq.minDives')}}
        <input type="number" min="0" step="1" name="preq[{{$index}}]['id']" class="form-control">

    </label>
    </div>
@endif
