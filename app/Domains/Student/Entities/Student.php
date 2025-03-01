<?php

namespace App\Domains\Student\Entities;

use App\Domains\Student\ValueObjects\Email;

class Student
{
    private int $id {
        get {
            return $this->id;
        }
    }
    private string $firstName {
        get {
            return $this->firstName;
        }
    }
    private string $lastName {
        get {
            return $this->lastName;
        }
    }
    private string $middleName {
        get {
            return $this->middleName;
        }
    }
    private Email $email {
        get {
            return $this->email;
        }
    }

    private string $address {
        get {
            return $this->address;
        }
    }
    private string $gender {
        get {
            return $this->gender;
        }
    }
    private string $extension {
        get {
            return $this->extension;
        }
    }

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

}
