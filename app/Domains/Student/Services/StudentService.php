<?php

namespace App\Domains\Student\Services;

use App\Domains\Core\Service\ServiceBase;
use App\Domains\Student\Data\StudentData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Exception;

class StudentService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct('App\Domains\Student\Entities\StudentModel');
    }

    /**
     * @throws Exception
     */
    public function getStudentById(string $id) : object {
        return $this->find($id);
    }

    /**
     * @throws Exception
     */
    public function getStudents() : LengthAwarePaginator {
        return $this->all();
    }

    /**
     * @throws Exception
     */
    public function createStudent(Request $request) : Model {
        $studentData = StudentData::from($request->all());
        return $this->create($studentData->toArray());
    }

    /**
     * @throws Exception
     */
    public function updateStudent(Request $request, string $id) : bool {
        $studentData = StudentData::from($request->all());
        return $this->update($studentData->toArray(), $id);
    }

    /**
     * @throws Exception
     */
    public function deleteStudent(string $id) : bool {
        return $this->delete($id);
    }
}
