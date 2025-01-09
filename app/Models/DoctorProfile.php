<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    protected $fillable = [
        'user_id', 'name','email','phone','city','speciality', 'age', 'gender', 'date_of_birth', 'bio', 'address', 'MedicalSchool','Certifications','Experience','Internship','Facebook','Instagram','Twitter'
    ];
}
