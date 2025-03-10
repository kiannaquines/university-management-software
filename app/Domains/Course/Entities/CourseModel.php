<?php

namespace App\Domains\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'college',
        'college_description',
    ];
}
