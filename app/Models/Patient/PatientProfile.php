<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    protected $fillable = [
        'user_id', 'age', 'gender', 'date_of_birth', 'bio', 'address'
    ];
}
