<?php

namespace App\Domains\Instructor\Forms;

use App\Helpers\DBFormBuilder;

class UpdateInstructorForm extends DBFormBuilder
{
    public function __construct($action = '', $method = 'POST', $errors = [], ?array $model = [])
    {
        parent::__construct($action, $method, $errors, $model);
        $this->createDepartmentForm();
    }

    protected function createDepartmentForm(): void
    {
        $this->addField('text', 'firstname', 'Firstname', ['placeholder' => 'Enter your firstname', 'class' => 'border-gray-300'])
        ->addField('text', 'middlename', 'Middlename', ['placeholder' => 'Enter your middlename', 'class' => 'border-gray-300'])
        ->addField('text', 'lastname', 'Lastname', ['placeholder' => 'Enter your lastname', 'class' => 'border-gray-300'])
        ->addField('select', 'extension', 'Extension', ['options' => ['' => 'None', 'jr' => 'Jr.', 'sr' => 'Sr.']])
        ->addField('text', 'employee_id', 'Employee ID', ['placeholder' => 'Enter your employee id', 'class' => 'border-gray-300'])
        ->addSelectField('department', 'Department', 'departments', 'id', 'department')
        ->setSubmitLabel('Update')
        ->setFormClass('max-w-7xl mx-auto sm:px-6 lg:px-8')
        ->setSubmitButtonClass('w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3');
    }
}
