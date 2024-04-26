<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
 
        'cd',
        'viral_load',
        'ratio',
        'weight',
        'medicine',
        'dosage',
        'other_med',
        'visit_date'
    ];
}
