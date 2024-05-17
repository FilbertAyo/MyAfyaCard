<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Metric;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable=[
        'id',
        'user_id',
        'card_no',
        'first_name',
        'last_name',
        'contacts',
        'phone_number',
        'gender',
        'birth_date',
        'street',
        'district',
        'city',
        'country',
        'allergy',
        'family_exposure',
        'confirmed',
        'co_year',
        'partner',
        'supporter',
        'relation',
        'sup_address',
        'sup_contact',
        'local_leader',
        'local_contact',
        'mark',
        'reason',
        'stage',
       
    ];

     // Optionally, you can set default attributes for the model
     protected $attributes = [
        'allergy' => 'None',
    ];

    public function metrics()
    {
        return $this->hasMany(Metric::class, 'patient_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
