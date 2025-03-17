<?php

namespace App\Domains\Instructor\Forms;

use App\Domains\Department\Entities\DepartmentModel;
use Kian\EasyLaravelForm\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class CreateInstructorForm extends DBFormBuilder
{
    public function __construct(string $action = '', ?Model $model = null, $method = 'POST', $errors = [])
    {

        if(session()->has('errors') && session('errors') instanceof MessageBag) {
            $this->errors = session('errors')->getBag('default')->getMessages();
        }

        parent::__construct($action, $method, $errors, $model);
        $this->createDepartmentForm();
    }

    protected function createDepartmentForm(): void
    {
        $this->addField(
            'text',
            'firstname',
            'Firstname',
                [
                    'required' => 'required',
                    'placeholder' => 'Enter your firstname'
                ]
        )
        ->addField('text', 'middlename', 'Middlename', ['placeholder' => 'Enter your middlename'])
        ->addField('text', 'lastname', 'Lastname', ['placeholder' => 'Enter your lastname'])
        ->addField('select', 'extension', 'Extension', ['options' => ['' => 'None', 'jr' => 'Jr.', 'sr' => 'Sr.']])
        ->addField('text', 'employee_id', 'Employee ID', ['placeholder' => 'Enter your employee id'])
        ->addSelectField('department', 'Department', new DepartmentModel(), 'id', 'department')
        ->setSubmitLabel('Submit Department')
        ->setFormClass('max-w-7xl mx-auto sm:px-6 lg:px-8')
        ->setSubmitButtonClass('w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3');
    }
}
