<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRegister extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'last_name',
        'contacts',
        'phone_number',
        'patient_email',
        'gender',
        'birth_date',
        'street',
        'district',
        'city',
        'country'
    ];
}
