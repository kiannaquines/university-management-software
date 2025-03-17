<?php

namespace App\Domains\Student\Forms;

use Kian\EasyLaravelForm\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class StudentForm extends DBFormBuilder
{
    public function __construct(string $action = '', ?Model $model = null, $method = 'POST', $errors = [])
    {

        if(session()->has('errors') && session('errors') instanceof MessageBag) {
            $this->errors = session('errors')->getBag('default')->getMessages();
        }

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
