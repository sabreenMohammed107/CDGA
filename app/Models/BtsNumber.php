<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BtsNumber extends Model
{
    protected $fillable = [
        'bts_number_en_name', 'bts_number_value','active'
    ];
}
