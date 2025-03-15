<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Metric;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use HasFactory;

    use SoftDeletes;

    use Notifiable;

    protected $dates = ['deleted_at'];
    protected $table = 'patients';
    protected $primary_key = 'id';

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

    protected $hidden = [
        'card_no',
        'remember_token',
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
