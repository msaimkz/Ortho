<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Appoinment extends Model
{
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($appointment) {
            do {
                $token = strtoupper(Str::random(3)) . rand(1000, 9999);
            } while (self::where('token_no', $token)->exists());

            $appointment->token_no = $token;
        });
    }
}
