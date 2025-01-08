<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
