<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'venue_en_name', 'venue_ar_name','country_id'
    ];
    
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');

    }
   
    public function applicant()
    {
        return $this->hasMany('App\Models\applicant','venue_id','id');

    }
}
