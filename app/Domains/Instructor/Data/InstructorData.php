<?php

namespace App\Domains\Instructor\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class InstructorData extends Data
{
    public function __construct(
        #[Required] #[StringType] #[Max(255)] public string $firstname,
        #[Nullable] #[StringType] #[Max(255)] public string $middlename,
        #[Required] #[StringType] #[Max(255)] public string $lastname,
        #[Nullable] #[StringType] #[Max(255)] public ?string $extension = null,
        #[Required] #[StringType] #[Max(255)] public string $employee_id,
        #[Required] #[StringType] #[Max(255)] public string $department,
    )
    {}
}
