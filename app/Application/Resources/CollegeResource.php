<?php

namespace App\Application\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class CollegeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'college' => $this->college,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated,
        ];
    }
}
