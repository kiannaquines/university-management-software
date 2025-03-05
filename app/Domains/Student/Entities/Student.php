<?php

namespace App\Domains\Student\Entities;

use DateTime;

class Student
{
    public ?string $id {
        get => $this->id;
        set(?string $id) => $this->id = $id;
    }

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
        set(?string $middlename) => $this->middlename = $middlename;
    }

    public string $gender {
        get => $this->gender;
        set(string $gender) => $this->gender = $gender;
    }

    public ?string $extension {
        get => $this->extension;
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

    public ?DateTime $created_at {
        get => $this->created_at;
        set(?DateTime $created_at) => $this->created_at = $created_at;
    }

    public ?DateTime $updated_at {
        get => $this->updated_at;
        set(?DateTime $updated_at) => $this->updated_at = $updated_at;
    }

    public string $fullname {
        get => trim("{$this->firstname} " . ($this->middlename ? "{$this->middlename} " : "") . $this->lastname);
    }

    public function __construct(
        string $firstname,
        string $lastname,
        string $gender,
        string $age,
        string $address,
        string $student_id,
        ?string $middlename,
        ?string $extension,
        ?string $id = null,
        ?string $created_at = null,
        ?string $updated_at = null
    ) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->middlename = $middlename;
        $this->gender = $gender;
        $this->extension = $extension;
        $this->age = $age;
        $this->address = $address;
        $this->student_id = $student_id;
        $this->id = $id;

        if ($created_at) {
            $this->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $created_at);
        }

        if ($updated_at) {
            $this->updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $updated_at);
        }
    }
}
