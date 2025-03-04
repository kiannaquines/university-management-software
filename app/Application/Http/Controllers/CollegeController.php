<?php

namespace App\Application\Http\Controllers;

use App\Domains\College\Services\CollegeService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CollegeController extends Controller
{
    private CollegeService $collegeService;
    public function __construct(CollegeService $collegeService)
    {
        $this->collegeService = $collegeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $colleges = $this->collegeService->getAllColleges();
        return view('College.index',compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return View('College.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'college' => 'required|string|max:255',
        ]);
        $this->collegeService->createCollege($validated);
        return redirect()->route('colleges.index')->with('success', 'College created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : View
    {
        $college = $this->collegeService->getCollegeById($id);
        return View('College.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $college = $this->collegeService->getCollegeById($id);
        return View('College.edit',compact('college'));
    }

    /**
     * Update the specified resource in storage.
     * @throws \Exception
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $validated = $request->validate([
            'collegeId' => 'required|int|max:50',
            'college' => 'required|string|max:255',
        ]);

        $this->collegeService->updateCollege($id, $validated);
        return redirect()->route('colleges.index')->with('success', 'College updated successfully.');
    }

    /**
     * Confirm removal of the specified resource from storage.
     */
    public function confirm(string $id) : View
    {
        $college = $this->collegeService->getCollegeById($id);
        return View('College.confirm', compact('college'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $this->collegeService->deleteCollege($id);
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
    }
}
