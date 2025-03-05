<?php

namespace App\Domains\College\Interfaces;

interface ICollegeRepository {
    public function findCollegeById(string $id) : object;
    public function updateCollegeById(array $collegeData, string $id) : bool;
    public function createNewCollege(array $collegeData) : bool;
    public function deleteCollegeById(string $id) : bool;
    public function getAllCollege() : array;
}
