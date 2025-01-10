<?php

namespace App\Models\Doctor;

use Illuminate\Database\Eloquent\Model;

class DoctorWorkingTime extends Model
{
    protected $fillable = [
        'doctor_id', 'day','start_time','end_time' ,'status'
    ];
}
