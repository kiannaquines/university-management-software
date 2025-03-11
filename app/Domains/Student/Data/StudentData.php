<?php

namespace App\Domains\Student\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class StudentData extends Data
{
    public function __construct(
        #[Required] #[StringType] #[Max(255)] public string $firstname,
        #[Required] #[StringType] #[Max(255)] public string $lastname,
        #[Required] #[StringType] #[Max(255)] public string $middlename,
        #[Required] #[StringType] #[Max(255)] public string $gender,
        #[Nullable] #[StringType] #[Max(255)] public ?string $extension = null,
        #[Required] #[StringType] #[Max(255)] public string $age,
        #[Required] #[StringType] #[Max(255)] public string $address,
        #[Required] #[StringType] #[Max(255)] public string $student_id,
    ){}
}
