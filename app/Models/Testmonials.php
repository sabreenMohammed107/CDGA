<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testmonials extends Model
{
    protected $fillable = [
        'reviewer_name','reviewer_star_rate','reviewer_text'
    ];

}
