<?php

namespace App\Domains\College\Repositories;

use App\Domains\College\Entities\College;
use App\Domains\College\Interfaces\CollegeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CollegeRepository implements CollegeRepositoryInterface {

    public function findById(string $id): ?College
    {
        $college = DB::table('college')->where('id', $id)->first();
        return new College(
            collegeName: $college->college,
            collegeId: $college->id,
            createdAt:  $college->created_at,
            updatedAt: $college->updated_at,
        );
    }

    public function findAll(): array
    {
        $colleges = DB::table('college')->get();
        return $colleges->map(function ($college) {
            return new College(
                collegeName: $college->college,
                collegeId: $college->id,
                createdAt: $college->created_at,
                updatedAt: $college->updated_at,
            );
         })->toArray();
    }

    public function save(College $college): void
    {
        DB::table('college')->insert([
            'college' => $college->collegeName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function update(College $college): void
    {
       DB::table('college')->where('id', $college->collegeId)->update([
           'college' => $college->collegeName,
           'updated_at' => now(),
       ]);
    }

    public function delete(string $id): void
    {
        DB::table('college')->where('id', $id)->delete();
    }
}
