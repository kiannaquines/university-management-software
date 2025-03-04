<?php

namespace App\Application\Http\Controllers;

use App\Domains\College\Services\CollegeService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollegeController extends Controller
{
    private CollegeService $collegeService;
    public function __construct(CollegeService $collegeService)
    {
        $this->$collegeService = $collegeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('College.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Confirm removal of the specified resource from storage.
     */
    public function confirm(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
