<?php

namespace App\Domains\Student\Entities;

use App\Domains\Student\ValueObjects\Email;

class Student
{
    private int $id;
    private string $name;
    private Email $email;

    public function __construct(string $id, string $name, Email $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function enrollInCourse(string $courseId): void
    {
        // Example business logic: a student can enroll in a course
        // Could add validation (e.g., max courses) or events here
    }

    public function updateName(string $newName): void
    {
        if (empty($newName)) {
        throw new \InvalidArgumentException("Name cannot be empty.");
        }
        $this->name = $newName;
    }

    // Getters
    public function id(): string { return $this->id; }
    public function name(): string { return $this->name; }
    public function email(): Email { return $this->email; }
}
