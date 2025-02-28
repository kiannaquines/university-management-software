<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected  $table = 'student';
    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'gender',
        'extension',
        'age',
        'address',
        'student_id',
    ];
}
