<?php

namespace App\Domains\College\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface ICollegeRepository {
    public function findCollegeById(string $id) : object;
    public function updateCollegeById(array $collegeData, string $id) : bool;
    public function createNewCollege(array $collegeData) : Model;
    public function deleteCollegeById(string $id) : bool;
    public function getAllCollege() : LengthAwarePaginator;
}
