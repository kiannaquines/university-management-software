<?php

namespace App\Domains\Student\Services;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Repositories\StudentRepository;

class StudentService
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createStudent(array $data): Student
    {
        $student = new Student(
            $data['firstname'],
            $data['lastname'],
            $data['gender'],
            $data['age'],
            $data['address'],
            $data['student_id'],
            $data['middlename'],
            $data['extension'],
        );
        $this->repository->save($student);
        return $student;
    }

    public function getStudentById(string $id): ?Student
    {
        return $this->repository->findById($id);
    }

    // TODO: Implement the update student information
    public function updateStudent(string $id, array $data): void
    {
        $student = $this->repository->findById($id);
        if (!$student) throw new \Exception("Student not found.");

        $updatedStudent = new Student(
        $data['firstname'] ?? $student->firstname,
        $data['lastname'] ?? $student->lastname,
        $data['middlename'] ?? $student->middlename,
        $data['gender'] ?? $student->gender,
        $data['extension'] ?? $student->extension,
        $data['age'] ?? $student->age,
        $data['address'] ?? $student->address,
        $data['student_id'] ?? $student->student_id,
        );
        $this->repository->update($updatedStudent);
    }

    public function getAllStudents() : array
    {
       return $this->repository->findAll();
    }

    // TODO: Implement the remove student information
    public function deleteStudent(string $id): void
    {
        $this->repository->delete($id);
    }
}
