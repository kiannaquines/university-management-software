<?php

namespace App\Application\Http\Controllers;

use App\Domains\College\Forms\CreateCollegeForm;
use App\Domains\College\Forms\UpdateCollegeForm;
use App\Domains\College\Services\CollegeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class CollegeController extends Controller
{
    private CollegeService $collegeService;
    public function __construct(CollegeService $collegeService)
    {
        $this->collegeService = $collegeService;
    }

    /**
     * Display a listing of the resource.
     * @throws Exception
     */
    public function index() : View
    {
        $colleges = $this->collegeService->getAllColleges();
        return view('college.index',compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];

        $collegeForm = new CreateCollegeForm(
            action: route('college.store'),
            errors: $errors
        )->render();
        return View('college.create',compact('collegeForm'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->collegeService->createNewCollege($request);
        return redirect()->route('college.index')->with('success', 'College created successfully.');
    }

    /**
     * Display the specified resource.
     * @throws Exception
     */
    public function show(string $id) : View
    {
        $college = $this->collegeService->getCollegeById($id);
        return View('college.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws Exception
     */
    public function edit(string $id) : View
    {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
        $college = $this->collegeService->getCollegeById($id);
        $collegeForm = new UpdateCollegeForm(
            route('college.update', $id),
            'PUT',
            $errors,
            $college,
        )->render();
        return View('college.edit',compact('collegeForm'));
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $validated = $request->validate([
            'id' => 'required|int|max:50',
            'college' => 'required|string|max:255',
        ]);

        $result = $this->collegeService->updateCollege($validated, $id);

        if ($result){
            return redirect()->route('college.index')->with('success', 'College updated successfully.');
        }
        return redirect()->route('college.index')->with('error', 'College could not be updated.');
    }

    /**
     * Confirm removal of the specified resource from storage.
     * @throws Exception
     */
    public function confirm(string $id) : View|RedirectResponse
    {
        $college = $this->collegeService->getCollegeById($id);
        if (!$college){
            return redirect()->route('college.index')->with('error', 'College could not be found.');
        }
        return View('college.confirm', compact('college'));
    }


    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(string $id) : RedirectResponse
    {
        $result = $this->collegeService->deleteCollege($id);

        if ($result) {
            return redirect()->route('college.index')->with('success', 'College deleted successfully.');
        }
        return redirect()->route('college.index')->with('error', 'College could not be deleted.');
    }
}
