<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    protected $table ='billing_details';
    protected $fillable = [
        'salut_id', 'name', 'country_id', 'job_title', 'company',
        'venue_id', 'address', 'email', 'phone', 'mobile', 'fax',
        'applicant_id'
    ];

    public function salut()
    {
        return $this->belongsTo('App\Models\ApplicantSalut','salut_id');

    }

    public function applicant()
    {
        return $this->belongsTo('App\Models\ApplicantSalut','salut_id');

    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');

    }

    public function venues()
    {
        return $this->belongsTo('App\Models\Venue','venue_id');

    }
}
