<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $fillable = [
        'course_code', 'course_en_name','course_en_desc','course_sub_category_id','course_image','course_image_thumbnail',
        'course_duration','course_brochure','Accreditation','course_highlight','course_objectives','course_audience',
        'course_training_methods','course_daily_agenda','active'
       
    ];


    public function subCategory()
    {
        return $this->belongsTo('App\Models\CourseSubCategory','course_sub_category_id');

    }
    public function relatedcourse()
    {
        return $this->hasMany('App\Models\Course','related_course_id');
    }

    public function rounds()
    {
        return $this->hasMany('App\Models\Round','course_id');
    }
    public function applicant()
    {
        return $this->hasMany('App\Models\applicant','course_id','id');

    }
}
