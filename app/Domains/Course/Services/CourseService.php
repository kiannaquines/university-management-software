<?php

namespace App\Domain\Course\Services;

class CourseService {
    public string $name;
    public string $description;

    public function __construct(string $name, string $description){
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }
}
