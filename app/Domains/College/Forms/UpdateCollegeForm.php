<?php

namespace App\Domains\College\Forms;

use App\Helpers\DBFormBuilder;

class UpdateCollegeForm extends DBFormBuilder
{
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?array $model = [])
    {
        parent::__construct($action, $method, $errors, $model);
        $this->updateCollegeForm();
    }

    protected function updateCollegeForm(): void
    {
        $this->addField('hidden', 'id', attributes:['required' => true]);
        $this->addField('textarea', 'college', 'College', ['required' => true]);
    }
}
