<?php

namespace App\Domains\College\Forms;

use Kian\EasyLaravelForm\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class UpdateCollegeForm extends DBFormBuilder
{
    public function __construct(string $action = '', ?Model $model = null, array $errors = [], string $method = 'PUT')
    {   
        if (session()->has('errors') && session('errors') instanceof MessageBag) {
            $this->errors = session('errors')->getBag('default')->getMessages();
        }

        parent::__construct($action, $method, $errors, $model);
        $this->updateCollegeForm();
    }

    protected function updateCollegeForm(): void
    {
        $this->addField('hidden', 'id', attributes: ['required' => true]);
        $this->addField('textarea', 'college', 'College', ['required' => true]);
    }
}
