<?php

namespace App\Application\Http\Controllers;

use App\Domains\Student\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class StudentController extends Controller
{
    private StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * @throws Exception
     */
    public function index(): View
    {
        $students = $this->studentService->getStudents();
        return view('Student.index',compact('students'));
    }

    public function create(): View
    {
        return view('Student.create');
    }

    /**
     * @throws Exception
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'extension' => 'nullable|string|max:50',
            'age' => 'required|integer|min:18|max:100',
            'address' => 'required|string|max:255',
            'student_id' => 'required|string|unique:student,student_id|max:50'
        ]);

        $result = $this->studentService->createStudent($validated);

        if ($result) {
            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        }
        return redirect()->route('students.index')->with('error', 'Student created failed.');
    }

    /**
     * @throws Exception
     */
    public function show(string $id): View
    {
        $student = $this->studentService->getStudentById($id);
        return view('Student.show',compact('student'));
    }

    /**
     * @throws Exception
     */
    public function edit(string $id): View
    {
        $student = $this->studentService->getStudentById($id);
        return view('Student.edit',compact('student'));
    }

    /**
     * @throws Exception
     */
    public function confirm(string $id): string
    {
        $student = $this->studentService->getStudentById($id);
        return view('Student.confirm',compact('student'));
    }

    /**
     * @throws Exception
     */
    public function update(Request $request, string $id): RedirectResponse
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
        $this->studentService->updateStudent($validated, $id);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * @throws Exception
     */
    public function destroy(string $id): RedirectResponse
    {
        $result = $this->studentService->deleteStudent($id);

        if ($result) {
            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        }
        return redirect()->route('students.index')->with('error', 'Student deleted failed.');
    }
}
