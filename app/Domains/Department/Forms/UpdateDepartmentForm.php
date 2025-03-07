<?php

namespace App\Domains\Department\Forms;

use App\Helpers\FormBuilder;

class UpdateDepartmentForm extends FormBuilder
{
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?array $model = [])
    {
        parent::__construct($action, $method, $errors, $model);
        $this->updateDepartmentForm();
    }

    protected function updateDepartmentForm(): void
    {
        $this->addField('text', 'department', 'Department Name', ['required' => 'required'])
            ->addField('textarea', 'department_description', 'Description')
            ->addSelectField('college_id', 'College', 'colleges', 'id', 'college', ['required' => 'required']);
    }
}
