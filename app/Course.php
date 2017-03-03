<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function modules()
    {
        return $this->hasMany('App\CourseModules');
    }
}
