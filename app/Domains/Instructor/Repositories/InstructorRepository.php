<?php

namespace App\Domains\Instructor\Repositories;

use App\Domains\Core\Repository\RepositoryBase;
use App\Domains\Instructor\Interfaces\IInstructor;
use Exception;

class InstructorRepository extends RepositoryBase implements IInstructor
{

    public function __construct()
    {
        parent::__construct('instructor', 'App\Domains\Instructor\Entities\Instructor');
    }

    /**
     * @param string $id
     * @return object
     * @throws Exception
     */
    public function findInstructorById(string $id): object
    {
       return $this->find($id);
    }

    /**
     * @param array $instructorData
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function updateInstructorById(array $instructorData, string $id): bool
    {
        return $this->update($instructorData, $id);
    }

    /**
     * @param array $instructorData
     * @return bool
     * @throws Exception
     */
    public function createNewInstructor(array $instructorData): bool
    {
        return $this->create($instructorData);
    }


    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function deleteInstructorById(string $id): bool
    {
        return $this->delete($id);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllInstructor(): array
    {
        return $this->all();
    }
}
