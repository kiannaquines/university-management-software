<?php

namespace App\Domains\Department\Entities;
use DateTime;

class Department {

    public function __construct(
        string $department,
        ?string $id = null,
        ?string $department_description = null,
        ?string $college_id = null,
        ?DateTime $created_at = null,
        ?DateTime $updated_at = null
    )
    {
        $this->id = $id;
        $this->department = $department;
        $this->college_id = $college_id;
        $this->department_description = $department_description;

        if ($created_at) {
            $this->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $created_at);
        }

        if($updated_at) {
            $this->updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $updated_at);
        }
    }

    public ?string $id {
        get => $this->id;
        set(?string $id) => $this->id = $id;
    }

    public string $department {
        get => $this->department;
        set(string $department) => $this->department = $department;
    }

    public ?string $college_id {
        get => $this->college_id;
        set(?string $college_id) => $this->college_id = $college_id;
    }

    public ?string $department_description {
        get => $this->department_description;
        set(?string $department_description) => $this->department_description = $department_description;
    }

    public ?DateTime $created_at {
        get => $this->created_at;
        set(?DateTime $created_at) => $this->created_at = $created_at;
    }

    public ?DateTime $updated_at {
        get => $this->updated_at;
        set(?DateTime $updated_at) => $this->updated_at = $updated_at;
    }
}
