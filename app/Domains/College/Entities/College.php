<?php

namespace App\Domains\College\Entities;

use DateTime;

class College {
    public ?string $collegeId {
        get => $this->collegeId;
        set(?string $collegeId) => $this->collegeId = $collegeId;
    }
    public string $collegeName {
        get => $this->collegeName;
        set(?string $collegeName) => $this->collegeName = $collegeName;
    }

    public ?DateTime $createdAt {
        get => $this->createdAt;
        set(?DateTime $createdAt) => $this->createdAt = $createdAt;
    }

    public ?DateTime $updatedAt {
        get => $this->updatedAt;
        set(?DateTime $updatedAt) => $this->updatedAt = $updatedAt;
    }

    public function __construct(
        string $collegeName,
        ?string $collegeId = null,
        ?string $createdAt = null,
        ?string $updatedAt = null
    ) {
        $this->collegeId = $collegeId;
        $this->collegeName = $collegeName;

        if ($createdAt) {
            $this->createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $createdAt);
        }

        if ($updatedAt) {
            $this->updatedAt = DateTime::createFromFormat('Y-m-d H:i:s', $updatedAt);
        }
    }

    public function toArray() : array {
        return [
            'collegeId' => $this->collegeId,
            'collegeName' => $this->collegeName,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt
        ];
    }
}
