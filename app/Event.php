<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    /**
     *
     */
    const KIND_COURSE = 'course';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function eventable()
    {
        return $this->morphTo();
    }

    public static function create(Request $request)
    {
        $instance = new self();
        $beginStr  = str_ireplace('T',' ',$request->input('begins')).":00";
        $endStr = str_ireplace('T',' ',$request->input('ends')).":00";
        $instance->begins = \DateTime::createFromFormat('Y-m-d H:i:s', $beginStr);
        $instance->ends = \DateTime::createFromFormat('Y-m-d H:i:s', $endStr);
        $instance->cost = $request->input('cost', 0.00);
        $instance->price = $request->input('price', 0.00);
        $instance->eventable_type = $request->input('eventable_type','Course');
        $instance->eventable_id = $request->input('eventable_id',null);
        $instance->prices = $request->input('prices');
        if($instance->save()) {
            return $instance;
        }
        else{
            false;
        }
    }

}
