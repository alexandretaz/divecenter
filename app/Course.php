<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const LEVEL_ENTRY_SUPERVISIONED = 1;
    const LEVEL_ENTRY_NOT_SUPERVISIONED = 2;
    const LEVEL_ADVENTURE = 3;
    const LEVEL_ADVANCED = 4;
    const LEVEL_RESCUE = 5;
    const LEVEL_SPECIALTY = 6;
    const LEVEL_PRO = 7;

    const ViewFolder='course';
    const Single='course';
    const Plural='courses';
    const LIST_NAME = 'courses\' list';

    protected $fillable = [
        'course',
        'description',
        'cost',
        'price',
        'level',
    ];

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
        $next = \App\Event::query()->where('eventable_type','=', 'course')->where('eventable_id','=',$this->id)->where('begins','>=', $today->format('Y-m-d'))->orderBy('begins','Asc')->first(['begins']);
        return $next['begins'];
    }

    public function getNextDatesAttribute() {
        $today = new \DateTime();
        $next = \App\Event::query()->where('eventable_type','=', 'course')->where('eventable_id','=',$this->id)->where('begins','>=', $today->format('Y-m-d'))->orderBy('begins','Asc')->get();
        return $next;
    }

    public static function getAllLevels()
    {
        return [self::LEVEL_ENTRY_SUPERVISIONED, self::LEVEL_ENTRY_NOT_SUPERVISIONED, self::LEVEL_ADVENTURE,self::LEVEL_ADVANCED, self::LEVEL_RESCUE, self::LEVEL_SPECIALTY, self::LEVEL_PRO];
    }
}
