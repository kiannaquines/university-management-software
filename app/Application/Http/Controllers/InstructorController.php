<?php

namespace App\Application\Http\Controllers;

use App\Domains\Instructor\Forms\CreateInstructorForm;
use App\Domains\Instructor\Services\InstructorService;
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
        $instructorForm = new CreateInstructorForm(route('instructor.store'), 'POST', $errors)->render();
        return view('instructor.create',compact('instructorForm'));
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

        $instructorForm = new CreateInstructorForm(
            route('instructor.update', $instructor->id),
            'PUT',
            $errors,
            $instructor,
        )->render();

        return view('instructor.edit', compact('instructorForm'));
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
