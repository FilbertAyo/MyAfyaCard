<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Metric extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'patient_id',
        'cd',
        'viral_load',
        'ratio',
        'weight',
        'medicine',
        'dosage',
        'other_med',
        'visit_date',
        'enrolment',
        'prognosis',
        'doctor',
        'doctor_contact'
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
