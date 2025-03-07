<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments';
    protected $fillable = ['department','department_description','college_id'];
    protected $primaryKey = 'id';
}
