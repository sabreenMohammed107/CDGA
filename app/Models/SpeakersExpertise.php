<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakersExpertise extends Model
{
    protected $fillable = [
        'speaker_id','expertise_id'
    ];
}
