<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $fillable = [
        'text'
    ];
    
    public function speakers()
    {
        return $this->belongsToMany('App\Models\Speakers','speakers_expertises','speaker_id');
    }
}
