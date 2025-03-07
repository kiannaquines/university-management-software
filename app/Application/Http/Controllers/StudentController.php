<?php

namespace App\Application\Http\Controllers;

use App\Domains\College\Forms\DeleteStudentForm;
use App\Domains\Student\Forms\StudentForm;
use App\Domains\Student\Services\StudentService;
use App\Infrastructure\Models\StudentModel;
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
        return view('student.index',compact('students'));
    }

    public function create(): View
    {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
        $studentForm = new StudentForm(route('students.store'), 'POST', $errors)->render();
        return view('student.create',compact('studentForm'));
    }

    /**
     * @throws Exception
     */
    public function store(Request $request) : RedirectResponse
    {
        $result = $this->studentService->createStudent($request);

        if ($result) {
            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        }

        return redirect()->route('students.index')->with('error', 'student created failed.');
    }

    /**
     * @throws Exception
     */
    public function show(string $id): View
    {
        $student = $this->studentService->getStudentById($id);
        return view('student.show',compact('student'));
    }

    /**
     * @throws Exception
     */

    public function edit(string $id): View
    {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
        $student = StudentModel::findOrFail($id);

        $studentForm = new StudentForm(
            route('students.update', $student->id),
            'PUT',
            $errors,
            $student
        )->render();

        return view('student.edit', compact('studentForm'));
    }



    /**
     * @throws Exception
     */
    public function confirm(string $id): View
    {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
        $student = $this->studentService->getStudentById($id);
        $studentForm = new DeleteStudentForm(route('students.destroy', $student->id), 'DELETE', $errors, $student)
            ->render();
        return view('student.confirm',compact('student', 'studentForm'));
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
        return redirect()->route('students.index')->with('error', 'student deleted failed.');
    }
}
