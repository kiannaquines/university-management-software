<?php

namespace App\Domains\Student\Repositories;

use App\Domains\Core\Repository\RepositoryBase;
use App\Domains\Student\Interfaces\IStudentRepository;
use Exception;

class StudentRepository extends RepositoryBase implements IStudentRepository
{

    public function __construct()
    {
        parent::__construct('student', 'App\Domains\Student\Entities\Student');
    }
    /**
     * @return array
     * @throws Exception
     */
    public function getAllStudent() : array
    {
        return $this->all();
    }

    /**
     * @param $id
     * @return object
     * @throws Exception
     */
    public function findStudentById($id): object
    {
        return $this->find($id);
    }

    /**
     * @param array $studentData
     * @return bool$studentData
     * @throws Exception
     */
    public function createNewStudent(array $studentData): bool
    {
        return $this->create($studentData);
    }

    /**
     * @param array $studentData
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function updateStudentById(array $studentData, $id): bool
    {
        return $this->update($studentData, $id);
    }

    /**
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function deleteStudentById($id): bool
    {
        return $this->delete($id);
    }
}

