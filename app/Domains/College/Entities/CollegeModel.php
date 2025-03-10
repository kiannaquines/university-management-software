<?php

namespace App\Domains\College\Entities;

use Illuminate\Database\Eloquent\Model;

class CollegeModel extends Model
{
    protected $table = 'colleges';
    protected $fillable = ['college'];
    protected $primaryKey = 'id';
}
