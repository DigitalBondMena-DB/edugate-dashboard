<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionForm extends Model
{
    use HasFactory;
    protected $fillable = [
          'destination',
          'university',
          'faculty',
          'major',
          'department',
          'degree_needed',
          'registered', 
          'status_after_register',
          'paper_status', 'deal', 
          'account_finance_first_image',
          'account_finance_first_number', 
          'account_finance_first_status',  
          'account_finance_second_image', 
          'account_finance_second_number', 
          'account_finance_second_status',
          'account_finance_third_image', 
          'account_finance_third_number', 
          'account_finance_third_status', 
          'account_finance_fourth_image', 
          'account_finance_fourth_number', 
          'account_finance_fourth_status', 
          'accounts_status', 
          'correspondence',
          'model_number', 
          'user_id', 
          'academic_guide',
          'en_academic_guide',  
          'day', 
          'month', 
          'year', 
          'register_day', 
          'register_month', 
          'register_year'
        ];

    public function scopeListAdmissionForm($query) {
        if(auth()->user()->role != 'academic-guide') {
            return $query->where('registered', 0);
        } else {
            return $query->where('registered', 0)->where('academic_guide', auth()->user()->name);
        }
    }

    public function scopeRegisterAdmissionForm($query) {
        if(auth()->user()->role != 'academic-guide') {
            return $query->where('registered', 1);
        } else {
            return $query->where('registered', 1)->where('academic_guide', auth()->user()->name);
        }
    }

    public function scopeMovementAdmissionForm($query) {
        if(auth()->user()->role != 'academic-guide') {
            return $query->where('registered', 1)->where('paper_status', '!=', null);
        } else {
            return $query->where('registered', 1)->where('paper_status', '!=', null)->where('academic_guide', auth()->user()->name);
        }
    }

    // public function scopeCountryAdmissionForm($query, $destination) {
    //     return $query->where('destination_id', $destination);
    // }

    // public function scopeUniversityAdmissionForm($query, $university) {
    //     return $query->where('university_id', $university);
    // }

    // public function academic_guide() {
    //     return $this->belongsTo(User::class, 'academic_guide_id', 'id');
    // }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function destination() {
    //     return $this->belongsTo(Destination::class);
    // }

    // public function university() {
    //     return $this->belongsTo(University::class);
    // }

    // public function faculty() {
    //     return $this->belongsTo(Faculty::class);
    // }

    // public function major() {
    //     return $this->belongsTo(Major::class);
    // }

    // public function department() {
    //     return $this->belongsTo(Department::class);
    // }
}
