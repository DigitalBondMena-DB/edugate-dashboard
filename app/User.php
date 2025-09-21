<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ar_name','en_name', 'email', 'password', 'phone', 'role', 'degree_needed', 'status', 'calls', 'source', 'comment' , 'admin_status' , 'image' , 'facebook_link' , 'tweet_link' , 'insta_link'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personal_info() {
        return $this->hasOne(UserPersonal::class);
    }

    public function academic_info() {
        return $this->hasOne(UserAcademic::class);
    }

    public function academic_admission_forms() {
        return $this->hasMany(AdmissionForm::class, 'academic_guide', 'name');
    }

    public function file_movement() {
        return $this->hasMany(FileMovement::class);
    }

    public function ifUserHasFileMovement() {
        return $this->file_movement()->count() ? $this->file_movement() : null;
    }

    public function user_admission_forms() {
        return $this->hasMany(AdmissionForm::class, 'user_id', 'id');
    }

    // public function list_user_admission_forms() {
    //     return $this->user_admission_forms()->where('registered', 0);
    // }

    // public function registered_user_admission_forms() {
    //     return $this->user_admission_forms()->where('registered', 1);
    // }
}
