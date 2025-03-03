<?php

namespace App\Domains\Student\Entities;

class Student
{
    public string $firstname {
        get => $this->firstname;
        set(string $firstname) => $this->firstname = $firstname;
    }
    public string $lastname {
        get => $this->lastname;
        set(string $lastname) => $this->lastname = $lastname;
    }
    public ?string $middlename {
        get => $this->middlename;
        set(null|string $middlename) => $this->middlename = $middlename ;
    }
    public string $gender {
        get => $this->gender;
        set(string $gender) => $this->gender = $gender;
    }
    public ?string $extension {
        get =>  $this->extension;
        set(?string $extension) => $this->extension = $extension;
    }
    public string $age {
        get => $this->age;
        set(string $age) => $this->age = $age;
    }
    public string $address {
        get => $this->address;
        set(string $address) => $this->address = $address;
    }
    public string $student_id {
        get => $this->student_id;
        set(string $student_id) => $this->student_id = $student_id;
    }

    public function __construct(
        string $firstname,
        string $lastname,
        ?string $middlename,
        string $gender,
        ?string $extension,
        string $age,
        string $address,
        string $student_id
    ) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->middlename = $middlename;
        $this->gender = $gender;
        $this->extension = $extension;
        $this->age = $age;
        $this->address = $address;
        $this->student_id = $student_id;
    }

}
