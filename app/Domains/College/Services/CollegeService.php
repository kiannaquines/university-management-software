<?php

namespace App\Domains\College\Services;

use App\Domains\College\Repositories\CollegeRepository;
use Exception;
use Illuminate\Http\Request;

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
     * @param Request $data
     * @return bool
     * @throws Exception
     */
    public function createCollege(Request $request): bool
    {
        $validated = $request->validate([
            'college' => 'required|string|max:255',
        ]);
        return $this->collegeRepository->createNewCollege($validated);
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
