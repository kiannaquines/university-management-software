<?php

namespace App\Application\Http\Controllers\Api;

use App\Application\Http\Controllers\Controller;
use App\Application\Resources\CollegeCollection;
use App\Application\Resources\CollegeResource;
use App\Domains\College\Services\CollegeService;
use Exception;
use Illuminate\Http\Request;

class ApiCollegeController extends Controller {
    private CollegeService $collegeService;
    public function __construct(CollegeService $collegeService)
    {
        $this->collegeService = $collegeService;
    }

    /**
     * @return CollegeCollection
     * @response CollegeCollection
     * @throws Exception
     */
    public function index() : CollegeCollection
    {
        return new CollegeCollection($this->collegeService->getAllColleges());
    }

    /**
     * @param string $id
     * @return CollegeResource
     * @throws Exception
     */
    public function show(string $id) :  CollegeResource {
        return new CollegeResource($this->collegeService->getCollegeById($id));
    }

    /**
     * @param Request $request
     * @response CollegeResource
     * @throws Exception
     */
    public function store(Request $request) : CollegeResource {
        $validated = $request->validate([
            'college' => 'required|string|max:255',
        ]);
        return new CollegeResource($this->collegeService->createCollege($request));
    }
}
