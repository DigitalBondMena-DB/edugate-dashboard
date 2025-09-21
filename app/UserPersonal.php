<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPersonal extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'birthdate', 'gender', 'nationality', 'nation', 'address', 'area', 'degree_needed', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
