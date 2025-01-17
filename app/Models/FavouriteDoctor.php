<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteDoctor extends Model
{
    protected $fillable = [
        'user_id', 'doctor_id',
    ];

    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id');
      }
}
