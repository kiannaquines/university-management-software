<?php

namespace App\Domains\Instructor\Services;

use App\Domains\Instructor\Repositories\InstructorRepository;
use Exception;
use Illuminate\Http\Request;

class InstructorService
{
    private InstructorRepository $instructorRepository;

    public function __construct(InstructorRepository $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }

    /**
     * @param string $id
     * @return object
     * @throws Exception
     */
    public function getInstructorById(string $id) : object
    {
        return $this->instructorRepository->findInstructorById($id);
    }

    /**
     * @param Request $data
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function updateInstructor(Request $request, string $id): bool
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'extension' => 'nullable|string|max:255',
            'employee_id' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
        return $this->instructorRepository->updateInstructorById($validated, $id);
    }

    /**
     * @param Request $request
     * @return bool
     * @throws Exception
     */
    public function createInstructor(Request $request): bool
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'extension' => 'nullable|string|max:255',
            'employee_id' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
        return $this->instructorRepository->createNewInstructor($validated);
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function deleteInstructor(string $id): bool
    {
        return $this->instructorRepository->deleteInstructorById($id);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllInstructors(): array
    {
        return $this->instructorRepository->getAllInstructor();
    }
}
