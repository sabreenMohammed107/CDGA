<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'job_name', 'job_requirements','active'
    ];

    public function careerApplicant()
    {
        return $this->hasMany('App\Models\CareersApplicant','career_id','id');

    }
}
