<?php

namespace App\Domains\Student\Entities;

use App\Domains\Student\ValueObjects\Email;

class Student
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $middleName;
    private Email $email;

    private string $address;
    private string $gender;
    private string $extension;

    public function __construct(int $id, string $firstName, string $lastName, string $middleName, Email $email, string $address, string $gender, string $extension)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->middleName = $middleName;
        $this->email = $email;
        $this->address = $address;
        $this->gender = $gender;
        $this->extension = $extension;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }
}
