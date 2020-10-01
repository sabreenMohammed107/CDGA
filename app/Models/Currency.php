<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function currancy()
    {
        return $this->hasMany('App\Models\Round','currency_id','id');
    }
}
