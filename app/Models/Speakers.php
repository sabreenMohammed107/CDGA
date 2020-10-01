<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speakers extends Model
{
    protected $fillable = [
        'salut_id', 'frist_name','last_name','email', 'country_id','venue_id','address', 'mobile','phone',
        'other_data', 'cv_path','doc_path',
    ];
    
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');

    }
    public function venue()
    {
        return $this->belongsTo('App\Models\Venue','venue_id');

    }
    public function salut()
    {
        return $this->belongsTo('App\Models\ApplicantSalut','salut_id');

    }

    public function expertise()
    {
        return $this->belongsToMany('App\Models\Expertise','speakers_expertises','speaker_id','expertise_id');
    }

    public function course()
    {
        return $this->belongsToMany('App\Models\TeachCourse','speaker_courses','speaker_id','course_id');
    }
}
