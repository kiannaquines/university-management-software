<?php

namespace App\Domains\College\Forms;

use App\Helpers\DBFormBuilder;
use Illuminate\Database\Eloquent\Model;

class DeleteStudentForm extends DBFormBuilder {
    public function __construct(string $action = '', string $method = 'POST', array $errors = [], ?Model $model = null)
    {
        parent::__construct($action, $method, $errors, $model);
        $this->deleteStudentForm();
    }

    /**
     * @return void
     */
    public function deleteStudentForm() : void {
        $this->addField('hidden', 'id', attributes:['required' => true]);
    }
}
