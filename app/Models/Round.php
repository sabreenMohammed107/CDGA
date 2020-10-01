<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = [
        'round_code', 'course_id','round_price','currency_id','round_start_date','round_end_date','country_id','venue_id'
        ,'round_place','show_home_order','active'
    ];
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function venue()
    {
        return $this->belongsTo('App\Models\Venue');
    }

    public function currancy()
    {
        return $this->belongsTo('App\Models\Currency','currency_id');
    }

    public function applicant()
    {
        return $this->hasMany('App\Models\Applicant','register_round_id','id');
    }



}
