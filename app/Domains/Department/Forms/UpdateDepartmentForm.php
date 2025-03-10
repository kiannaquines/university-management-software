<?php

namespace App\Domains\Department\Forms;

use App\Domains\College\Entities\CollegeModel;
use App\Helpers\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;

class UpdateDepartmentForm extends DBFormBuilder
{
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?Model $model = null)
    {
        parent::__construct($action, $method, $errors, $model);
        $this->updateDepartmentForm();
    }

    protected function updateDepartmentForm(): void
    {
        $this->addField('text', 'department', 'Department Name', ['required' => 'required'])
            ->addField('textarea', 'department_description', 'Description')
            ->addSelectField('college_id', 'College', new CollegeModel(), 'id', 'college', ['required' => 'required']);
    }
}
