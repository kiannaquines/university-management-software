<?php

namespace App\Application\Http\Controllers;

use App\Domains\College\Forms\DeleteStudentForm;
use App\Domains\Student\Entities\StudentModel;
use App\Domains\Student\Forms\StudentForm;
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
        return view('student.index',compact('students'));
    }

    public function create(): View
    {
        $form = new StudentForm(route('students.store'));
        $studentForm = $form->render();
        return view('student.create',compact('studentForm'));
    }

    /**
     * @throws Exception
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->studentService->createStudent($request);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
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

        $form = new StudentForm(
            route(
                'students.update',
                $student->id
            ),
            $student,
            'PUT',
        );
        $studentForm = $form->render();
        return view('student.edit', compact('studentForm'));
    }



    /**
     * @throws Exception
     */
    public function confirm(string $id): View
    {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
        $student = $this->studentService->getStudentById($id);
        $form = new DeleteStudentForm(
            route(
                'students.destroy',
                $student->id
            ),
            $student
        );
        $studentForm = $form->render();
        return view('student.confirm',compact('student', 'studentForm'));
    }

    /**
     * @throws Exception
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->studentService->updateStudent($request, $id);
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
