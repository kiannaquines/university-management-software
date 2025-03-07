<?php

namespace App\Domains\College\Forms;

use App\Helpers\DBFormBuilder;

class CreateCollegeForm extends DBFormBuilder
{
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?array $model = [])
    {
        parent::__construct($action, $method, $errors, $model);
        $this->createCollegeForm();
    }

    protected function createCollegeForm(): void
    {
        $this->addField('textarea', 'college', 'College', ['required' => true]);
    }
}
