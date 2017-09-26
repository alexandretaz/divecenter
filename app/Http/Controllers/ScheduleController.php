<?php

namespace App\Http\Controllers;

use App\Course;
use App\Event;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function addGeneral()
    {

    }

    public function addCourse($entityID)
    {
        $kind = Event::KIND_COURSE;
        $entityID = decrypt($entityID);
        $course = Course::findOrFail($entityID);
        $entity = new Event();
        return view('schedule.course',['kind'=>$kind, 'course'=>$course, 'entity'=>$entity]);

    }

    public function create(Request $request)
    {
        $event = Event::create($request);
        if(!$event) {
            return response("", 500);
        }
        $request->session()->flash('status','success');
        $request->session()->flash('message', 'course.schedule');
        return redirect()->to('/course/view/'.encrypt($request->input('eventable_id')));
    }

    public function addTrip()
    {

    }

    public function addClass()
    {

    }

    public function deleteGeneral()
    {

    }

    public function deleteTrip()
    {

    }

    public function deleteClass()
    {

    }

    public function deleteCourse()
    {

    }
}
