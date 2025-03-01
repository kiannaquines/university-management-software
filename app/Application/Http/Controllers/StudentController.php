<?php

namespace App\Application\Http\Controllers;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Interface\IStudentService;
use App\Domains\Student\Exceptions\StudentNotFoundException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DateTime;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(IStudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\RedirectResponse | View
    {
        // You might want to add a method to get all students in the service
        $students = \App\Infrastructure\Models\StudentModel::all(); // Direct model access for simplicity
        return view('Student.index', compact('students'));
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
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'middlename' => 'nullable|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'extension' => 'nullable|string|max:50',
                'age' => 'required|date',
                'address' => 'required|string|max:255',
                'student_id' => 'required|string|unique:student,student_id|max:50'
            ]);

            $student = new Student(
                $validated['firstname'],
                $validated['lastname'],
                $validated['middlename'],
                $validated['gender'],
                $validated['extension'],
                $validated['age'],
                $validated['address'],
                $validated['student_id']
            );

            $this->studentService->create($student);

            return redirect()->route('student.index')
                ->with('success', 'Student created successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\RedirectResponse | View
    {
        try {
            $student = $this->studentService->findById($id);
            return view('Student.show', compact('student'));
        } catch (StudentNotFoundException $e) {
            return redirect()->route('student.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): \Illuminate\Http\RedirectResponse | View
    {
        try {
            $student = $this->studentService->findById($id);
            return view('Student.edit', compact('student'));
        } catch (StudentNotFoundException $e) {
            return redirect()->route('student.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'middlename' => 'nullable|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'extension' => 'nullable|string|max:50',
                'age' => 'required',
                'address' => 'required|string|max:255',
                'student_id' => 'required|string|max:50|unique:student,student_id,' . $id
            ]);

            $student = new Student(
                (int)$id,
                $validated['firstname'],
                $validated['lastname'],
                $validated['middlename'],
                $validated['gender'],
                $validated['extension'],
                $validated['age'],
                $validated['address'],
                $validated['student_id']
            );

            $this->studentService->update($student);

            return redirect()->route('student.index')
                ->with('success', 'Student updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Confirm removal of the specified resource from storage.
     */
    public function confirm(string $id): \Illuminate\Http\RedirectResponse | View
    {
        try {
            $student = $this->studentService->findById($id);
            return view('Student.confirm', compact('student'));
        } catch (StudentNotFoundException $e) {
            return redirect()->route('student.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->studentService->delete((int)$id);
            return redirect()->route('student.index')
                ->with('success', 'Student deleted successfully');
        } catch (StudentNotFoundException $e) {
            return redirect()->route('student.index')
                ->with('error', $e->getMessage());
        }
    }
}
