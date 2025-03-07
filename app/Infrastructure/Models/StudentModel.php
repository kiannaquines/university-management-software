<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected  $table = 'students';
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
    protected $primaryKey = 'id';
}
