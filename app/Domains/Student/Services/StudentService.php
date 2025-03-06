<?php

namespace App\Domains\Student\Services;

use App\Domains\Student\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Exception;

class StudentService
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * @throws Exception
     */
    public function getStudentById(string $id) : object {
        return $this->studentRepository->findStudentById($id);
    }

    /**
     * @throws Exception
     */
    public function getStudents() : array {
        return $this->studentRepository->getAllStudent();
    }

    /**
     * @throws Exception
     */
    public function createStudent(Request $request) : bool {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'extension' => 'nullable|string|max:50',
            'age' => 'required|integer|min:18|max:100',
            'address' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id|max:50'
        ]);
        return $this->studentRepository->create($validated);
    }

    /**
     * @throws Exception
     */
    public function updateStudent(array $student, string $id) : bool {
        return $this->studentRepository->update($student, $id);
    }

    /**
     * @throws Exception
     */
    public function deleteStudent(string $id) : bool {
        return $this->studentRepository->deleteStudentById($id);
    }

}
