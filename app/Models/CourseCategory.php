<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{


    public function courseSubCategories()
    {
        return $this->hasMany('App\Models\CourseSubCategory','course_category_id','id');
    }
}
