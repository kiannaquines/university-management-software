<?php

namespace App\Domains\College\Entities;

use DateTime;

class College {
    public ?string $id {
        get => $this->id;
        set(?string $id) => $this->id = $id;
    }
    public string $college {
        get => $this->college;
        set(?string $college) => $this->college = $college;
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
        string $college,
        ?string $id = null,
        ?string $created_at = null,
        ?string $updated_at = null
    ) {
        $this->id = $id;
        $this->college = $college;

        if ($created_at) {
            $this->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $created_at);
        }

        if ($updated_at) {
            $this->updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $updated_at);
        }
    }
}
