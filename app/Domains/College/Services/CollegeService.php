<?php

namespace App\Domains\College\Services;

use App\Domains\College\Data\CollegeData;
use App\Domains\Core\Service\ServiceBase;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class CollegeService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct('App\Domains\College\Entities\CollegeModel');
    }

    /**
     * @param string|null $keyword
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllColleges(?string $keyword = null, int $perPage = 20): LengthAwarePaginator
    {
        return $this->all($keyword, $perPage);
    }


    /**
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    public function createNewCollege(Request $request): Model
    {
        $collegeData = CollegeData::from($request->all());
        return $this->create($collegeData->toArray());
    }

    /**
     * @param string $id
     * @return Model
     * @throws Exception
     */
    public function getCollegeById(string $id) : Model {
        return $this->find($id);
    }

    /**
     * @param array $data
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function updateCollege(Request $data, string $id) : bool
    {
        $collegeData = CollegeData::from($data->all());
        return $this->update($collegeData->toArray(), $id);
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function deleteCollege(string $id) : bool
    {
        return $this->delete($id);
    }
}
