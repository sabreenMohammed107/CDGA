<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'branch_name', 'address','office_phone','mobile','email','map_location','country_id',
        'venue_id','hq','active'
    ];
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function venue()
    {
        return $this->belongsTo('App\Models\Venue');
    }

}
