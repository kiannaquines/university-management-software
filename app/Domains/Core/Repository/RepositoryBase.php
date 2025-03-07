<?php

namespace App\Domains\Core\Repository;

use App\Domains\Core\Interface\IRepositoryBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;
class RepositoryBase implements IRepositoryBase {

    protected string $entityClass;

    /**
     * @param string $entityClass
     * @throws Exception
     */
    public function __construct(string $entityClass) {
        $this->entityClass = $entityClass;

        if (!class_exists($entityClass) || !is_subclass_of($entityClass, Model::class)) {
            throw new Exception("Entity class {$entityClass} must be a valid Eloquent model");
        }
    }

    /**
     * @param string $id
     * @return Model|null
     * @throws Exception
     */
    public function find(string $id): ?Model
    {
        return $this->entityClass::findOrFail($id);
    }

    /**
     * @param array $data
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function update(array $data, string $id): bool
    {
        $entity = $this->find($id);
        return $entity->update($data);
    }

    /**
     * @param array $data
     * @return Model
     * @throws Exception
     */
    public function create(array $data): Model
    {
        return $this->entityClass::create($data);
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function delete(string $id): bool
    {
        $entity = $this->find($id);
        return $entity->delete();
    }

    /**
     * @param string|null $keyword
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function all(?string $keyword=null, int $perPage=20): LengthAwarePaginator
    {
        $query = $this->entityClass::query();

        if ($keyword) {
            $query->where('college', 'LIKE', "%{$keyword}%");
        }

        return $query->paginate($perPage);
    }
}
