<?php

namespace App\Application\Http\Controllers;

use App\Domains\Student\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = $this->studentService->getAllStudents();
        return view('Student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('Student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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

        if ($this->studentService->createStudent($validated)) {
            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        }

        return redirect()->route('students.index')->with('error', 'Student could not be created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $student = $this->studentService->getStudentById($id);
        return view('Student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $student = $this->studentService->getStudentById($id);
        return view('Student.edit', compact('student'));
    }

    public function confirm(string $id): View
    {
        $student = $this->studentService->getStudentById($id);
        return view('Student.confirm', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'firstname' => 'sometimes|required|string|max:255',
            'lastname' => 'sometimes|required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'gender' => 'sometimes|required|string|in:Male,Female',
            'extension' => 'nullable|string|max:50',
            'age' => 'sometimes|required|date',
            'address' => 'sometimes|required|string|max:255',
            'student_id' => 'sometimes|required|string|max:50|unique:student,student_id,' . $id
        ]);

        $this->studentService->updateStudent($id, $validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->studentService->deleteStudent($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
