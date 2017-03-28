<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function modules()
    {
        return $this->hasMany('App\CourseModules');
    }

    public function requisites()
    {
        return $this->hasMany('App\CourseRequisites');
    }

    public function events()
    {
        return $this->morphMany('App\Event','eventable');
    }
}
