<?php

namespace App\Domains\College\Services;

use App\Domains\College\Entities\College;
use App\Domains\College\Repositories\ICollegeRepository;

class CollegeService
{
    private ICollegeRepository $repository;

    public function __construct(ICollegeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCollege(array $data): College
    {
        $college = new College(
            collegeName: $data['college'],
        );
        $this->repository->save($college);
        return $college;
    }

    public function getCollegeById(string $id): ?College
    {
        return $this->repository->findById($id);
    }


    /**
     * @throws \Exception
     */
    public function updateCollege(string $id, array $data): void
    {
        $college = $this->repository->findById($id);
        if (!$college) throw new \Exception("College not found.");

        $updateCollege = new College(
            collegeName: $data['college'],
            collegeId: $data['collegeId'],
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
