<?php

namespace App\Domains\College\Forms;

use App\Helpers\DBFormBuilder;

class DeleteStudentForm extends DBFormBuilder {
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?array $model = [])
    {
        parent::__construct($action, $method, $errors, $model);
    }

    /**
     * @return void
     */
    public function deleteStudentForm() : void {
        $this->addField('hidden', 'id', attributes:['required' => true]);
        $this->addField('submit', 'submit', 'Delete Student');
    }
}
