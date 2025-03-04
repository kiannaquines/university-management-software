<?php

namespace App\Domains\College\Repositories;

use App\Domains\College\Entities\College;
use App\Domains\Core\Repository\IRepositoryBase;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
class ICollegeRepository implements IRepositoryBase {

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

    public function save(object $entity): void
    {
        DB::table('college')->insert([
            'college' => $entity->collegeName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * @throws Exception
     */
    public function update(object $entity): void
    {
        try {
            DB::table('colleges')
                ->where('id', $entity->collegeId)
                ->update([
                    'college' => $entity->collegeName,
                    'updated_at' => now(),
                ]);
        } catch (QueryException $e) {
            throw new Exception("Error updating college: " . $e->getMessage());
        }
    }

    public function delete($id): void
    {
        DB::table('college')->where('id', $id)->delete();
    }
}
