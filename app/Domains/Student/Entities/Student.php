<?php

namespace App\Domains\Student\Entities;

class Student
{

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
    private string $email {
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

    public function __construct(string $firstName, string $lastName, string $middleName, string $email, string $address, string $gender, string $extension)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->middleName = $middleName;
        $this->email = $email;
        $this->address = $address;
        $this->gender = $gender;
        $this->extension = $extension;
    }

}
