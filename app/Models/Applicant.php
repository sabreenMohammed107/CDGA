<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'code', 'salut_id', 'name', 'country_id', 'job_title', 'company',
        'venue_id', 'address', 'email', 'phone', 'mobile', 'fax',
        'register_round_id', 'course_id', 'quk_enquery_notes', 'inhouse_no_days', 'inhouse_perefer_dates',
        'applicant_type_id','inhouse_requirements','inhouse_no_particants'
    ];


    public function salut()
    {
        return $this->belongsTo('App\Models\ApplicantSalut','salut_id');

    }

    public function round()
    {
        return $this->belongsTo('App\Models\Round','register_round_id');

    }
 public function courses()
    {
        return $this->belongsTo('App\Models\Course','course_id');

    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');

    }

    public function venues()
    {
        return $this->belongsTo('App\Models\Venue','venue_id');

    }

}
