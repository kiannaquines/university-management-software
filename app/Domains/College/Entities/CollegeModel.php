<?php

namespace App\Domains\College\Entities;

use Illuminate\Database\Eloquent\Model;


final class CollegeResources
{
    public const ID = 'id';
    public const TABLE_NAME = 'colleges';
    public const FILLABLE = 'college';
}

class CollegeModel extends Model
{
    protected $table = CollegeResources::TABLE_NAME;
    protected $fillable = [CollegeResources::FILLABLE];
    protected $primaryKey = CollegeResources::ID;
}
