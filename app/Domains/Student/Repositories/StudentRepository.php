<?php

namespace App\Domains\Student\Repositories;

use App\Domains\Core\Repository\RepositoryBase;
use App\Domains\Student\Interfaces\IStudentRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentRepository extends RepositoryBase implements IStudentRepository
{

    public function __construct()
    {
        parent::__construct('App\Domains\Student\Entities\StudentModel');
    }
    /**
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getAllStudent() : LengthAwarePaginator
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
     * @return Model
     * @throws Exception
     */
    public function createNewStudent(array $studentData): Model
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

