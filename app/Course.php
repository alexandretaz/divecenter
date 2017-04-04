<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const ViewFolder='course';
    const Single='course';
    const Plural='courses';
    const LIST_NAME = 'courses\' list';

    public static $_list = [
        ['name'=>'id', 'label'=>'#', 'is_ordenable'=>true, 'is_filter'=>false],
        ['name'=>'course', 'label'=>'course', 'is_ordenable'=>true, 'is_filter'=>false],
        ['name'=>'price', 'label'=>'price', 'is_ordenable'=>true, 'is_filter'=>false],
        ['name'=>'next_date', 'label'=>'next date', 'is_ordenable'=>true, 'is_filter'=>false],
    ];
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

    public function getNextDateAttribute() {
        $today = new \DateTime();
        $next = \App\Events::query()->where('eventable_type','=', 'course')->where('eventable_id','=',$this->id)->where('begins','>=', $today->format('Y-m-d'))->orderBy('begins','Asc')->first();
        return $next;
    }

    public function getNextDatesAttribute() {
        $today = new \DateTime();
        $next = \App\Events::query()->where('eventable_type','=', 'course')->where('eventable_id','=',$this->id)->where('begins','>=', $today->format('Y-m-d'))->orderBy('begins','Asc')->get();
        return next;
    }

}
