<?php

namespace App\Domains\College\Forms;

use Kian\EasyLaravelForm\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;

class CreateCollegeForm extends DBFormBuilder
{
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?Model $model = null)
    {
        parent::__construct($action, $method, $errors, $model);
        $this->createCollegeForm();
    }

    protected function createCollegeForm(): void
    {
        $this->addField('textarea', 'college', 'College', ['required' => true]);
    }
}
