<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function chapters()
    {
        return $this->hasMany(CourseChapter::class);
    }
}
