<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    const MAIN_ENTITY = 'App\Course';
    const ViewFolder = 'course';

    public function getPreqForm($type, $index=0)
    {
        return view(self::ViewFolder.'.pre_req_form',['type'=>$type, 'index'=>$index]);
    }

    public function create(CourseRequest $request)
    {
        $entity = $this->getEntity();
        return $this->make($request);
    }
}
