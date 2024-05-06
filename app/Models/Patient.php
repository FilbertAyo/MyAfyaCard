<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Metric;

class Patient extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
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


    public function metrics()
    {
        return $this->hasMany(Metric::class, 'patient_id','id');
    }

}
