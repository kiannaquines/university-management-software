<?php

namespace App\Application\Http\Controllers;

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
        return View('college.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->collegeService->createCollege($request);
        return redirect()->route('colleges.index')->with('success', 'college created successfully.');
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
        $college = $this->collegeService->getCollegeById($id);
        return View('college.edit',compact('college'));
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

        $this->collegeService->updateCollege($validated, $id);
        return redirect()->route('colleges.index')->with('success', 'college updated successfully.');
    }

    /**
     * Confirm removal of the specified resource from storage.
     */
    public function confirm(string $id) : View
    {
        $college = $this->collegeService->getCollegeById($id);
        return View('college.confirm', compact('college'));
    }


    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(string $id) : RedirectResponse
    {
        $this->collegeService->deleteCollege($id);
        return redirect()->route('colleges.index')->with('success', 'college deleted successfully.');
    }
}
