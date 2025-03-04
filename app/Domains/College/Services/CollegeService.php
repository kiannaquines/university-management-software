<?php

namespace App\Domains\College\Services;

use App\Domains\College\Entities\College;
use App\Domains\College\Repositories\CollegeRepository;

class CollegeService
{
    private CollegeRepository $repository;

    public function __construct(CollegeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCollege(array $data): College
    {
        $college = new College(
            collegeName: $data['lastname'],
        );
        $this->repository->save($college);
        return $college;
    }

    public function getCollegeById(string $id): ?College
    {
        return $this->repository->findById($id);
    }

    // TODO: Implement the update student information

    /**
     * @throws \Exception
     */
    public function updateCollege(string $id, array $data): void
    {

        $student = $this->repository->findById($id);

        if (!$student) throw new \Exception("College not found.");

        $updateCollege = new College(
            collegeName: $data['firstname'],
        );
        $this->repository->update($updateCollege);
    }

    public function getAllColleges() : array
    {
        return $this->repository->findAll();
    }
    public function deleteCollege(string $id): void
    {
        $this->repository->delete($id);
    }
}
