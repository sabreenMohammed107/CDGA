<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedCourses extends Model
{

protected $fillable = [
        'course_id','related_course_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function relatedcourse()
    {
        return $this->belongsTo('App\Models\Course','related_course_id');
    }
}
