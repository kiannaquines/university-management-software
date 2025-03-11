<?php

namespace App\Domains\Instructor\Services;

use App\Domains\Core\Service\ServiceBase;
use App\Domains\Instructor\Data\InstructorData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;

class InstructorService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct('App\Domains\Instructor\Entities\InstructorModel');
    }

    /**
     * @param string $id
     * @return object
     * @throws Exception
     */
    public function getInstructorById(string $id) : object
    {
        return $this->find($id);
    }

    /**
     * @param Request $data
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function updateInstructor(Request $request, string $id): bool
    {
        $instructorData = InstructorData::from($request->all())->toArray();
        return $this->update($instructorData, $id);
    }

    /**
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    public function createInstructor(Request $request): Model
    {
        $instructorData = InstructorData::from($request->all());
        return $this->create($instructorData->toArray());
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function deleteInstructor(string $id): bool
    {
        return $this->delete($id);
    }

    /**
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getAllInstructors(): LengthAwarePaginator
    {
        return $this->all();
    }
}
