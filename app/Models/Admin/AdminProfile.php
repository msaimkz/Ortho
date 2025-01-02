<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $fillable = [
        'user_id', 'profile_img', 'age', 'gender', 'date_of_birth', 'bio', 'address',
    ];
}
