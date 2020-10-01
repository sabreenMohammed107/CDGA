<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    protected $fillable = [
        'slider_en_title', 'slider_en_subtitle','slider_video_url','testimonials_video_url','active'
    ];
}
