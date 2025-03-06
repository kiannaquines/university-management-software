<?php

namespace App\Application\Http\Controllers;

use App\Domains\Instructor\Services\InstructorService;
use App\Helpers\FormBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class InstructorController extends Controller {

    private InstructorService $instructorService;

    public function __construct(InstructorService $instructorService) {
        $this->instructorService = $instructorService;
    }

    /**
     * @throws Exception
     */
    public function index() : View {
        $instructors = $this->instructorService->getAllInstructors();
        return view('instructor.index',compact('instructors'));
    }

    /**
     * @param string $id
     * @return View
     * @throws Exception
     */
    public function show(string $id) : View {
        $instructor = $this->instructorService->getInstructorById($id);
        return view('instructor.show', compact('instructor'));
    }

    /**
     * @return View
     */
    public function create() : View {

        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];

        $form = new FormBuilder(route('instructor.store'), 'POST', $errors)
            ->addField('text', 'firstname', 'Firstname', ['placeholder' => 'Enter your firstname', 'class' => 'border-gray-300'])
            ->addField('text', 'middlename', 'Middlename', ['placeholder' => 'Enter your middlename', 'class' => 'border-gray-300'])
            ->addField('text', 'lastname', 'Lastname', ['placeholder' => 'Enter your lastname', 'class' => 'border-gray-300'])
            ->addField('select', 'extension', 'Extension', ['options' => ['' => 'None', 'jr' => 'Jr.', 'sr' => 'Sr.']])
            ->addField('text', 'employee_id', 'Employee ID', ['placeholder' => 'Enter your employee id', 'class' => 'border-gray-300'])
            ->addSelectField('department','Department', 'departments', 'id', 'department')
            ->setSubmitLabel('Register')
            ->setFormClass('max-w-7xl mx-auto sm:px-6 lg:px-8')
            ->setSubmitButtonClass('w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3')
            ->render();
        return view('instructor.create',compact('form'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request) : RedirectResponse {
        $result = $this->instructorService->createInstructor($request);
        return redirect()->route('instructor.index');
    }

    /**
     * @param string $id
     * @return View
     * @throws Exception
     */
    public function edit(string $id) : View {
        $instructor = $this->instructorService->getInstructorById($id);
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];

        $form = new FormBuilder(route('instructor.update', $id), 'POST', $errors)
            ->setModel((array) $instructor)
            ->addField('hidden', '_method', '', ['value' => 'PUT'])
            ->addField('text', 'firstname', 'Firstname', ['placeholder' => 'Enter your firstname', 'class' => 'border-gray-300'])
            ->addField('text', 'middlename', 'Middlename', ['placeholder' => 'Enter your middlename', 'class' => 'border-gray-300'])
            ->addField('text', 'lastname', 'Lastname', ['placeholder' => 'Enter your lastname', 'class' => 'border-gray-300'])
            ->addField('select', 'extension', 'Extension', ['options' => ['' => 'None', 'jr' => 'Jr.', 'sr' => 'Sr.']])
            ->addField('text', 'employee_id', 'Employee ID', ['placeholder' => 'Enter your employee id', 'class' => 'border-gray-300'])
            ->addSelectField('department', 'Department', 'departments', 'id', 'department')
            ->setSubmitLabel('Update')
            ->setFormClass('max-w-7xl mx-auto sm:px-6 lg:px-8')
            ->setSubmitButtonClass('w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3')
            ->render();
        return view('instructor.edit', compact('form'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, string $id) : RedirectResponse {
        $result = $this->instructorService->updateInstructor($request, $id);
        if($result) {
            return redirect()->route('instructor.index')->with('success', 'Instructor updated successfully.');
        }
        return redirect()->route('instructor.index')->with('error', 'Instructor could not be updated.');
    }

    /**
     * @param string $id
     * @return View
     * @throws Exception
     */
    public function confirm(string $id) : View {
        $instructor = $this->instructorService->getInstructorById($id);
        return view('instructor.confirm',compact('instructor'));
    }

    /**
     * @param string $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(string $id) : RedirectResponse {
        $result = $this->instructorService->deleteInstructor($id);

        if ($result){
            return redirect()->route('instructor.index')->with('success', 'Instructor deleted successfully.');
        }

        return redirect()->route('instructor.index')->with('error', 'Instructor could not be deleted.');
    }
}
