<?php

namespace App\Domains\Core\Interface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface IRepositoryBase {
    public function find(string $id): ?object;
    public function update(array $data, string $id): bool;
    public function create(array $data): Model;
    public function delete(string $id): bool;
    public function all(?string $keyword=null, int $perPage=10): LengthAwarePaginator;
}
