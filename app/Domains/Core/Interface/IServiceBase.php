<?php

namespace App\Domains\Core\Interface;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface IServiceBase {
    public function all() : LengthAwarePaginator;
    public function find(string $id) : Model;
    public function create(array $data) : Model;
    public function update(array $data, string $id) : bool;
    public function delete(string $id) : bool;
}
