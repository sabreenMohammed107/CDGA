<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareersApplicant extends Model
{
    protected $fillable = [
        'career_id', 'name','email','mobile', 'cv_path','doc_path','carrer_level_id', 'expected_salary'
        
    ];
    
    public function career()
    {
        return $this->belongsTo('App\Models\Career','career_id');

    }
    public function level()
    {
        return $this->belongsTo('App\Models\careerLevel','carrer_level_id');

    }
}
