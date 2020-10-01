<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachCourse extends Model
{
    protected $fillable = [
        'name'
    ];
   
    public function xxx()
    {
        return $this->belongsToMany('App\Models\Speakers','speaker_courses','speaker_id','course_id');
    }
}
