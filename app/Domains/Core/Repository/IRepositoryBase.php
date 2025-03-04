<?php

namespace App\Domains\Core\Repository;

interface IRepositoryBase {
    public function findById(string $id): ?object;
    public function findAll(): array;
    public function save(Object $entity): void;
    public function update(Object $entity): void;
    public function delete($id): void;
}
