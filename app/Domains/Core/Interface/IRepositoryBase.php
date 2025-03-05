<?php

namespace App\Domains\Core\Interface;

interface IRepositoryBase {
    public function find(string $id): ?object;
    public function update(array $data, string $id): bool;
    public function create(array $data): bool;
    public function delete(string $id): bool;
    public function all(?string $keyword=null, int $perPage=10): array;
}
