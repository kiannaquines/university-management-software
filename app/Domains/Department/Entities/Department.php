<?php

namespace App\Domains\Department\Entities;
use DateTime;

class Department {
    /**
     * @var string
     */
    public string $id {
        get => $this->id;
        set(string $value) => $this->id = $value;
    }

    /**
     * @var string
     */
    public string $department {
        get => $this->department;
        set(string $value) => $this->department = $value;
    }

    /**
     * @var DateTime|null
     */
    public ?DateTime $created_at {
        get => $this->created_at;
        set(?DateTime $value) => $this->created_at = $value;
    }

    /**
     * @var DateTime|null
     */
    public ?DateTime $updated_at {
        get => $this->updated_at;
        set(?DateTime $value) => $this->updated_at = $value;
    }

    public function __construct(
        string $id,
        string $department,
        ?DateTime $created_at,
        ?DateTime $updated_at
    )
    {
        $this->id = $id;
        $this->department = $department;

        if ($created_at) {
            $this->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $created_at);
        }

        if($updated_at) {
            $this->updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $updated_at);
        }
    }
}
