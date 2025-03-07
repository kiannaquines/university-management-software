<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorModel extends Model
{
    protected $table = 'instructor';
    protected $fillable = ['firstname', 'middlename', 'lastname', 'extension','employee_id' ,'department_id','department'];
    protected $primaryKey = 'id';
}
