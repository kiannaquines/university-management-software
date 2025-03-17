<?php

namespace App\Domains\College\Forms;

use Kian\EasyLaravelForm\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class DeleteStudentForm extends DBFormBuilder
{
    public function __construct(string $action = '', ?Model $model = null, string $method = 'DELETE', array $errors = [])
    {
        if(session()->has('errors') && session('errors') instanceof MessageBag) {
            $this->errors = session('errors')->getBag('default')->getMessages();

        }
        parent::__construct($action, $method, $errors, $model);
        $this->deleteStudentForm();
    }

    /**
     * @return void
     */
    public function deleteStudentForm(): void
    {
        $this->addField('hidden', 'id', attributes: ['required' => true]);
    }
}
