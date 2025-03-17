<?php

namespace App\Domains\Department\Forms;

use App\Domains\College\Entities\CollegeModel;
use Illuminate\Database\Eloquent\Model;
use Kian\EasyLaravelForm\DBFormBuilder;
use Illuminate\Support\MessageBag;

class CreateDepartmentForm extends DBFormBuilder
{
    protected array $errors = [];

    public function __construct(string $action = '', ?Model $model = null, array $errors = [], string $method = 'POST')
    {

        if (session()->has('errors') && session('errors') instanceof MessageBag) {
            $this->errors = session('errors')->getBag('default')->getMessages();
        }

        parent::__construct($action, $method, $errors, $model);
        $this->departmentForm();
    }

    protected function departmentForm(): void
    {
        $this->addField('text', 'department', 'Department Name', ['required' => 'required'])
            ->addField('textarea', 'department_description', 'Description')
            ->addSelectField('college_id', 'College', new CollegeModel(), 'id', 'college', ['required' => 'required']);
    }
}
