<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    const MAIN_ENTITY = 'App\Course';
    const ViewFolder = 'course';

    public $routes = ['edit'=>'course_edit',
        'view'=>'course_view',
        'schedule'=>'course_schedule',
        'delete'=>'course_delete'];

    public function getPreqForm($type, $index=0, $id=null)
    {
        return view(self::ViewFolder.'.pre_req_form',['type'=>$type, 'index'=>$index, 'id'=>$id]);
    }

    public function create(CourseRequest $request)
    {
        $entity = $this->getEntity();
        $entity = $this->make($request);

        foreach ($request->input('preq') as $req) {
            $preq = new \App\CourseRequisites();
            $preq->course_id = $entity->id;
            $preq->requisite_type = $req['kind'];
            $preq->requisite_value = $req['value'];
            $preq->save();
        }
        return redirect(route('course_list'));

    }
}
