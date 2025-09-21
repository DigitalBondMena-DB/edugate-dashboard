<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AdFormAreas extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'ad_form_countries_id'];

    public function adFormCountry() {
        return $this->belongsTo(AdFormCountries::class, 'ad_form_countries_id', 'id');
    }
}
