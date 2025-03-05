<?php

namespace App\Domains\College\Services;

use App\Domains\College\Repositories\CollegeRepository;
use Exception;

class CollegeService
{
    protected CollegeRepository $collegeRepository;

    public function __construct(CollegeRepository $collegeRepository)
    {
        $this->collegeRepository = $collegeRepository;
    }

    /**
     * @param string $id
     * @return object
     * @throws Exception
     */
    public function getCollegeById(string $id) : object
    {
        return $this->collegeRepository->findCollegeById($id);
    }

    /**
     * @param array $data
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function updateCollege(array $data, string $id): bool
    {
        return $this->collegeRepository->updateCollegeById($data, $id);
    }

    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function createCollege(array $data): bool
    {
        return $this->collegeRepository->createNewCollege($data);
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function deleteCollege(string $id): bool
    {
        return $this->collegeRepository->deleteCollegeById($id);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllColleges(): array
    {
        return $this->collegeRepository->getAllCollege();
    }
}
