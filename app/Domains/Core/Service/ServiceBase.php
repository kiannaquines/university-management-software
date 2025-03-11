<?php

namespace App\Domains\Core\Service;

use App\Domains\Core\Interface\IServiceBase;
use App\Domains\Core\Repository\RepositoryBase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;

class ServiceBase extends RepositoryBase implements IServiceBase
{

    public function __construct(string $entityClass)
    {
        parent::__construct($entityClass);
    }

    /**
     * @param string|null $keyword
     * @param int|null $perPage
     * @param array|string|null $searchFields
     * @return LengthAwarePaginator
     */
    public function all(?string $keyword = null, ?int $perPage = 20, array|string|null $searchFields = null): LengthAwarePaginator
    {
        return parent::all($keyword, $perPage);
    }

    /**
     * @param string $id
     * @return Model
     * @throws Exception
     */
    public function find(string $id): Model
    {
       return parent::find($id);
    }

    /**
     * @param array $data
     * @return Model
     * @throws Exception
     */
    public function create(array $data): Model
    {
        return parent::create($data);
    }

    /**
     * @param array $data
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function update(array $data, string $id) : bool
    {
        return parent::update($data, $id);
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function delete(string $id): bool
    {
       return parent::delete($id);
    }
}
