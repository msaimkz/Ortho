<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $table = 'contact_informations';

    protected $fillable = [
        'phone',
        'email',
        'address',
        'facebook',
        'youtube',
        'twitter',
        'instagram',
    ];
}
