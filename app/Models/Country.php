<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'country_en_name', 'country_ar_name'
    ];

    public function venue()
    {
        return $this->hasMany('App\Models\Venue','country_id','id');

    }
    
}
