<?php

namespace App\Domains\Student\Services;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Repositories\StudentRepository;
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
    public function createStudent(array $student) : bool {
        return $this->studentRepository->create($student);
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
