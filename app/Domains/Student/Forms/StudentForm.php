<?php

namespace App\Domains\Student\Forms;

use App\Helpers\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;

class StudentForm extends DBFormBuilder
{
    public function __construct($action = '', $method = 'POST', $errors = [], ?Model $model = null)
    {
        parent::__construct($action, $method, $errors, $model);
        $this->studentForm();
    }


    public function studentForm() : void {

        $this->addField('text', 'firstname', 'Firstname', ['placeholder' => 'Enter your firstname'])
            ->addField('text', 'middlename', 'Middlename', ['placeholder' => 'Enter your middlename'])
            ->addField('text', 'lastname', 'Lastname', ['placeholder' => 'Enter your lastname'])
            ->addField('text', 'age', 'Age', ['placeholder' => 'Enter your age'])
            ->addField('text', 'address', 'Permanent Address', ['placeholder' => 'Enter your permanent address'])
            ->addField('select', 'gender', 'Gender', ['options' => ['Male' => 'Male', 'Female' => 'Female']])
            ->addField('select', 'extension', 'Extension', ['options' => ['' => 'None', 'Jr' => 'Jr.', 'Sr' => 'Sr.']])
            ->addField('text', 'student_id', 'Student ID', ['placeholder' => 'Enter your student id'])
            ->setSubmitLabel('Submit');
    }
}
