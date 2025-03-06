<?php

namespace App\Domains\College\Repositories;

use App\Domains\College\Interfaces\ICollegeRepository;
use App\Domains\Core\Repository\RepositoryBase;
use Exception;

class CollegeRepository extends RepositoryBase implements ICollegeRepository {
    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct('colleges', 'App\Domains\College\Entities\College');
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
     * @return bool
     * @throws Exception
     */
    public function createNewCollege(array $collegeData) : bool {
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
     * @return array
     * @throws Exception
     */
    public function getAllCollege() : array {
        return $this->all();
    }
}
