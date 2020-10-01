<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'trainer_name','trainer_desc','trainer_image'
    ];

}
