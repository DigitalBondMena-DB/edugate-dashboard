<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AdFormCountries extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'slug'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function adFormAreas() {
        return $this->hasMany(AdFormAreas::class, 'ad_form_countries_id', 'id');
    }
}
