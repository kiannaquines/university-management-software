<?php

namespace App\Domains\College\Forms;

use App\Helpers\FormBuilder;

class CollegeForm extends FormBuilder
{
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?array $model = [])
    {
        parent::__construct($action, $method, $errors, $model);
    }

    protected function customize(): void
    {
        $this->addField('text', 'department', 'Department Name', ['required' => true])
        ->addField('textarea', 'department_description', 'Description')
        ->addSelectField('college_id', 'College', 'colleges');
    }
}
