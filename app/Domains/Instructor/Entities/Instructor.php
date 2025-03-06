<?php

namespace App\Domains\Instructor\Entities;

use DateTime;

class Instructor {
    public string $id {
        get => $this->id;
        set(?string $id) => $this->id = $id;
    }

    public string $firstname {
        get => $this->firstname;
        set(?string $firstname) => $this->firstname = $firstname;
    }

    public string $middlename {
        get => $this->middlename;
        set(?string $middlename) => $this->middlename = $middlename;
    }

    public string $lastname {
        get => $this->lastname;
        set(?string $lastname) => $this->lastname = $lastname;
    }

    public ?string $extension {
        get => $this->extension;
        set(?string $extension) => $this->extension = $extension;
    }

    public string $employee_id {
        get => $this->employee_id;
        set(?string $employee_id) => $this->employee_id = $employee_id;
    }

    public string $fullname {
        get => trim("{$this->firstname} {$this->lastname}");
    }

    public ?DateTime $created_at {
        get => $this->created_at;
        set(?DateTime $created_at) => $this->created_at = $created_at;
    }

    public ?DateTime $updated_at {
        get => $this->updated_at;
        set(?DateTime $updated_at) => $this->updated_at = $updated_at;
    }

    public function __construct(
        string $firstname,
        string $middlename,
        string $lastname,
        string $employee_id,
        ?string $extension = null,
        ?string $id = null,
        ?string $created_at = null,
        ?string $updated_at = null
    ) {
        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->extension = $extension;
        $this->employee_id = $employee_id;
        $this->id = $id;

        if ($created_at) {
            $this->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $created_at);
        }

        if ($updated_at) {
            $this->updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $updated_at);
        }
    }


}
