<?php

namespace App\Domains\College\Services;

use App\Domains\College\Interfaces\ICollegeRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;

class CollegeService
{
    protected ICollegeRepository $collegeRepository;

    public function __construct(ICollegeRepository $collegeRepository)
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
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    public function createCollege(Request $request): Model
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
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getAllColleges(): LengthAwarePaginator
    {
        return $this->collegeRepository->getAllCollege();
    }
}
