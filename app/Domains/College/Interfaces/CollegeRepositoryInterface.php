<?php

namespace App\Domains\College\Interfaces;

use App\Domains\College\Entities\College;

interface CollegeRepositoryInterface {
    public function findById(string $id): ?College;
    public function findAll(): array;
    public function save(College $college): void;
    public function update(College $college): void;
    public function delete(string $id): void;
}
