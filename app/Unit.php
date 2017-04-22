<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $fillable = ['name', 'semester', 'year', 'key', 'studentnumber', 'user_id'];

    protected $hidden = ['key'];

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lecturesCount()
    {
        return Lecture::where(['unit_id' => $this->id])->count();
    }

    public function activeLecture()
    {
        $now = Carbon::now();
//
//        $mindiff = $this->lectures()->first()->date->diffInHours($now, false);
//        $minid = $this->lectures()->first()->id;
//
//        foreach ($this->lectures as $lecture)
//        {
//           if($lecture->date->lte($now))
//           {
//                if($lecture->date->diffInHours($now, false) > $mindiff)
//                {
//                    $mindiff = $lecture->date->diffInHours($now, false);
//                    $minid = $lecture->id;
//
//                }
//
//           }
//        }
//
//        $lecture = Lecture::find($minid);
//        return $lecture;

        $lectures = Lecture::where(['unit_id' => $this->id])->where('date', '<', $now)->orderBy('date', 'desc')->first();

        if ($lectures)
        {
            return $lectures;
        }
        else
        {
            return Lecture::where(['unit_id' => $this->id])->orderBy('date', 'asc')->first();
        }

    }

}
