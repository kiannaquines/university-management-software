<?php

namespace App\Domains\Student\Forms;

use App\Helpers\DBFormBuilder;

class StudentForm extends DBFormBuilder
{
    public function __construct($action = '', $method = 'POST', $errors = [], ?array $model = [])
    {
        parent::__construct($action, $method, $errors, $model);
        $this->createStudentForm();
    }


    public function createStudentForm() : void {

        $this->addField('text', 'firstname', 'Firstname', ['placeholder' => 'Enter your firstname', 'class' => 'border-gray-300'])
            ->addField('text', 'middlename', 'Middlename', ['placeholder' => 'Enter your middlename', 'class' => 'border-gray-300'])
            ->addField('text', 'lastname', 'Lastname', ['placeholder' => 'Enter your lastname', 'class' => 'border-gray-300'])
            ->addField('text', 'age', 'Age', ['placeholder' => 'Enter your age', 'class' => 'border-gray-300'])
            ->addField('text', 'address', 'Permanent Address', ['placeholder' => 'Enter your permanent address', 'class' => 'border-gray-300'])
            ->addField('select', 'gender', 'Gender', ['options' => ['Male' => 'Male', 'Female' => 'Female']])
            ->addField('select', 'extension', 'Extension', ['options' => ['' => 'None', 'Jr' => 'Jr.', 'Sr' => 'Sr.']])
            ->addField('text', 'student_id', 'Student ID', ['placeholder' => 'Enter your student id', 'class' => 'border-gray-300'])
            ->setSubmitLabel('Submit');
    }
}
