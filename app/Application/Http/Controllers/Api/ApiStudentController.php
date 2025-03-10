<?php

namespace App\Application\Http\Controllers\Api;

use App\Application\Http\Controllers\Controller;
use App\Application\Resources\StudentCollection;
use App\Application\Resources\StudentResource;
use App\Domains\Student\Entities\StudentModel;
use App\Domains\Student\Services\StudentService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiStudentController extends Controller
{
    private StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * @throws Exception
     * @response StudentCollection
     */
    public function index()
    {
        $students = $this->studentService->getStudents();
        return new StudentCollection($students);
    }

    /**
     * @throws Exception
     * @response StudentResource
     */
    public function store(Request $request): StudentResource
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'extension' => 'nullable|string|max:50',
            'age' => 'required|integer|min:18|max:100',
            'address' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
        ]);
        $result = StudentModel::create($validated);
        return new StudentResource($result);
    }

    /**
     * @param string $id
     * @return StudentResource
     */
    public function show(string $id): StudentResource
    {
        $student = StudentModel::find($id);
        return new StudentResource($student);
    }


    /**
     * @param Request $request
     * @param int $id
     * @return StudentResource
     */
    public function update(Request $request, int $id): StudentResource
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'extension' => 'nullable|string|max:50',
            'age' => 'required|integer|min:18|max:100',
            'address' => 'required|string|max:255',
        ]);
        $student = StudentModel::findOrFail($id);
        $student->update($validated);
        return new StudentResource($student);
    }

    /**
     * @response JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $student = StudentModel::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found.'], 404);
        }

        if ($student->delete()) {
            return response()->json(['message' => 'Student deleted successfully.']);
        }

        return response()->json(['message' => 'Failed to delete student.'], 500);
    }
}
