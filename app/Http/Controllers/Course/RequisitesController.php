<?php

namespace App\Http\Controllers\Course;

use App\CourseRequisites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class RequisitesController extends Controller
{
    public function create (Request $request) {
       $data =[
        'requisite_type' => $request->input('type'),
        'requisite_value' => $request->input('value'),
        'course_id' => $request->input('course_id')];
       $requisite = new CourseRequisites($data);
        $requisite->save();

        return $requisite;

    }

    public function delete(Request $request) {
        $requisite = CourseRequisites::findOrFail($request->input('id'));
        $result = $requisite->delete();
        return json_encode($result);
    }
}
