<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'partner_name', 'partner_logo_url','partner_website','active'
    ];
}
