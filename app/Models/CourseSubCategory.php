<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubCategory extends Model
{
    protected $fillable = [
        'subcategory_code', 'subcategory_en_name','subcategory_en_description','subcategory_image','active','course_category_id'
    ];
   
    //changed by nour
   
    public function courseCategory()
    {
        return $this->belongsTo('App\Models\CourseCategory','course_category_id');
    }
    public function course()
    {
        return $this->hasMany('App\Models\Course','course_sub_category_id','id');
    }

    public function rounds()
    {
        return $this->hasManyThrough('App\Models\Round', 'App\Models\Course');
    }
}
