<?php

namespace App\Domains\College\Repositories;

use App\Domains\College\Entities\College;
use App\Domains\College\Interfaces\CollegeRepositoryInterface;

class CollegeRepository implements CollegeRepositoryInterface {

    public function findById(string $id): ?College
    {
        // TODO: Implement findById() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function save(College $college): void
    {
        // TODO: Implement save() method.
    }

    public function update(College $college): void
    {
        // TODO: Implement update() method.
    }

    public function delete(string $id): void
    {
        // TODO: Implement delete() method.
    }
}
