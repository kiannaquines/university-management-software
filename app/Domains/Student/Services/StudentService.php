<?php

namespace App\Domains\Student\Services;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Repositories\IStudentRepository;

class StudentService
{
    private IStudentRepository $repository;

    public function __construct(IStudentRepository $repository)
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

    /**
     * @throws \Exception
     */
    public function updateStudent(string $id, array $data): void
    {

        $student = $this->repository->findById($id);

        if (!$student) throw new \Exception("Student not found.");

        $updatedStudent = new Student(
            firstname: $data['firstname'],
            lastname: $data['lastname'],
            gender: $data['gender'],
            age: $data['age'],
            address: $data['address'],
            student_id: $data['student_id'],
            middlename: $data['middlename'],
            extension: $data['extension'],
        );
        $this->repository->update($updatedStudent);
    }

    public function getAllStudents() : array
    {
       return $this->repository->findAll();
    }
    public function deleteStudent(string $id): void
    {
        $this->repository->delete($id);
    }
}
