<?php

namespace App\Models;

use App\Models\Admin\Course;
use Illuminate\Database\Eloquent\Model;

class FavouriteCourse extends Model
{
    protected $fillable = [
        'user_id', 'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
