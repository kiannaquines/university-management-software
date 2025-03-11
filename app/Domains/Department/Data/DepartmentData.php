<?php

namespace App\Domains\Department\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class DepartmentData extends Data
{
    public function __construct(
        #[Required] #[StringType] #[Max(255)] public string $department,
        #[Required] #[StringType] #[Max(255)] public string $department_description,
        #[Required] #[StringType] #[Max(255)] public string $college_id,
    ) {}
}
