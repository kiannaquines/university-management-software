<?php

namespace App\Domains\Student\Entities;

use DateTime;
use DateTimeInterface;

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

    public ?DateTimeInterface $created_at {
        get => $this->created_at;
        set(?DateTimeInterface $created_at) => $this->created_at = $created_at;
    }

    public ?DateTimeInterface $updated_at {
        get => $this->updated_at;
        set(?DateTimeInterface $updated_at) => $this->updated_at = $updated_at;
    }

    public string $fullname {
        get => trim("{$this->firstname} " . ($this->middlename ? "{$this->middlename} " : "") . $this->lastname);
    }

    public function __construct(
        string $firstname,
        string $lastname,
        ?string $middlename,
        string $gender,
        ?string $extension,
        string $age,
        string $address,
        string $student_id,
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

        $this->created_at = $created_at
            ? DateTime::createFromFormat('Y-m-d H:i:s', $created_at)
            : null;
        if ($created_at && $this->created_at === false) {
            throw new \InvalidArgumentException("Invalid created_at format: $created_at");
        }

        $this->updated_at = $updated_at
            ? DateTime::createFromFormat('Y-m-d H:i:s', $updated_at)
            : null;
        if ($updated_at && $this->updated_at === false) {
            throw new \InvalidArgumentException("Invalid updated_at format: $updated_at");
        }
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'middlename' => $this->middlename,
            'gender' => $this->gender,
            'extension' => $this->extension,
            'age' => $this->age,
            'address' => $this->address,
            'student_id' => $this->student_id,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
