<?php

namespace App\Models\Doctor;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DoctorWorkingTime extends Model
{
    protected $fillable = [
        'doctor_id', 'day','start_time','end_time' ,'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
