<?php

namespace App\Application\Http\Controllers\Api;

use App\Application\Http\Controllers\Controller;
use App\Application\Resources\CollegeCollection;
use App\Application\Resources\CollegeResource;
use App\Domains\College\Services\CollegeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

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

    public function update(Request $request, string $id) : CollegeResource {
        $validated = $request->validate([
            'college' => 'required|string|max:255',
        ]);
        return new CollegeResource($this->collegeService->updateCollege($validated, $id));
    }

    /**
     * @param string $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(string $id) : JsonResponse {
        $result = $this->collegeService->deleteCollege($id);

        if ($result) {
            return redirect()->json(['message' => 'student deleted successfully.'], 200);
        }

        return redirect()->json(['message' => 'failed to delete student.'], 500);
    }


}
