<?php

namespace App\Domains\Student\Exceptions;

use Exception;

class StudentNotFoundException extends Exception
{
    public function __construct(string $id)
    {
        parent::__construct("Student with ID {$id} not found.");
    }
}
