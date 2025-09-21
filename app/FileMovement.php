<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileMovement extends Model
{
    use HasFactory;
    protected $fillable = [
        'passport',
        'passport_status',
        'secondary_certificate',
        'secondary_certificate_status',
        'birth_certificate',
        'birth_certificate_status',
        'diploma',
        'diploma_status',
        'bachelor',
        'bachelor_status',
        'degree_transcript',
        'degree_transcript_status',
        'master',
        'master_status',
        'authorization',
        'authorization_status',
        'image',
        'image_status',
        'last_document',
        'last_document_status',
        'capabilities',
        'other',
        'day',
        'month',
        'year',
        'delegate_day',
        'delegate_month',
        'delegate_year',
        'steps',
        'delegate_status',
        'equation_date',
        'egypt_arrival',
        'comment',
        'user_id',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
