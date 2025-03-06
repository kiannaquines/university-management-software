<?php

namespace App\Domains\Core\Repository;

use App\Domains\Core\Interface\IRepositoryBase;
use Illuminate\Support\Facades\DB;
use Exception;
use ReflectionClass;
use Carbon\Carbon;

class RepositoryBase implements IRepositoryBase {

    protected string $tableName;
    protected string $entityClass;

    /**
     * @param string $tableName
     * @param string $entityClass
     * @throws Exception
     */
    public function __construct(string $tableName, string $entityClass) {
        $this->tableName = $tableName;
        $this->entityClass = $entityClass;

        if (!class_exists($entityClass)) {
            throw new Exception("Entity class {$entityClass} not found");
        }
    }

    /**
     * @param string $id
     * @return mixed|null
     * @throws Exception
     */
    public function find(string $id): ?object
    {
        try {
            $data = DB::table($this->tableName)->where('id', $id)->first();

            if (!$data) {
                throw new Exception("{$this->entityClass} with ID {$id} not found");
            }

            $reflection = new ReflectionClass($this->entityClass);
            $constructor = $reflection->getConstructor();
            $params = $constructor ? $constructor->getParameters() : [];

            $itemArray = (array) $data;
            $args = [];

            foreach ($params as $param) {
                $name = $param->getName();
                $args[] = $itemArray[$name] ?? null;
            }

            return $reflection->newInstanceArgs($args);

        } catch (Exception $e) {
            throw new Exception("Error finding {$this->entityClass}: " . $e->getMessage());
        }
    }

    /**
     * @param array $data
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function update(array $data, string $id): bool
    {
        try {
            $data['updated_at'] = Carbon::now();
            $updated = DB::table($this->tableName)->where('id', $id)->update($data);

            if (!$updated) {
                throw new Exception("Failed to update {$this->entityClass} with ID {$id}");
            }

            return true;
        } catch (Exception $e) {
            throw new Exception("Error updating {$this->entityClass}: " . $e->getMessage());
        }
    }

    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function create(array $data): bool
    {
        try {
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            return DB::table($this->tableName)->insert($data);
        } catch (Exception $e) {
            throw new Exception("Error creating {$this->entityClass}: " . $e->getMessage());
        }
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function delete(string $id): bool
    {
        try {
            $deleted = DB::table($this->tableName)->where('id', $id)->delete();

            if (!$deleted) {
                throw new Exception("{$this->entityClass} with ID {$id} not found or already deleted");
            }

            return true;
        } catch (Exception $e) {
            throw new Exception("Error deleting {$this->entityClass}: " . $e->getMessage());
        }
    }

    /**
     * @param string|null $keyword
     * @param int $perPage
     * @return array
     * @throws Exception
     */
    public function all(?string $keyword=null, int $perPage=20): array
    {
        try {
            $query = DB::table($this->tableName);

            if ($keyword) {
                $query->where('college', 'LIKE', "%{$keyword}%");
            }

            $data = $query->paginate($perPage);

            $reflection = new ReflectionClass($this->entityClass);
            return $data->through(function ($item) use ($reflection) {
                $itemArray = (array) $item;
                $constructor = $reflection->getConstructor();
                $params = $constructor ? $constructor->getParameters() : [];
                $args = [];
                foreach ($params as $param) {
                    $name = $param->getName();
                    $args[] = $itemArray[$name] ?? null;
                }
                return $reflection->newInstanceArgs($args);
            })->all();

        } catch (Exception $e) {
            throw new Exception("Error fetching {$this->entityClass} entities: " . $e->getMessage());
        }
    }
}
