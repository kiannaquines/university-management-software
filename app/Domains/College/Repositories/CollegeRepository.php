<?php

namespace App\Domains\College\Repositories;

use App\Domains\College\Interfaces\ICollegeRepository;
use App\Domains\Core\Repository\RepositoryBase;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CollegeRepository extends RepositoryBase implements ICollegeRepository {
    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct('App\Domains\College\Entities\CollegeModel');
    }

    /**
     * @param string $id
     * @return object
     * @throws Exception
     */
    public function findCollegeById(string $id) : object {
        return $this->find($id);
    }

    /**
     * @param array $collegeData
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function updateCollegeById(array $collegeData, string $id) : bool {
        return $this->update($collegeData, $id);
    }

    /**
     * @param array $collegeData
     * @return Model
     * @throws Exception
     */
    public function createNewCollege(array $collegeData) : Model {
        return $this->create($collegeData);
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function deleteCollegeById(string $id) : bool {
        return $this->delete($id);
    }

    /**
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getAllCollege() : LengthAwarePaginator {
        return $this->all();
    }
}
