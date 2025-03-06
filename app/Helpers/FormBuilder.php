<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FormBuilder
{
    protected string $method;
    protected string $action;
    protected array $fields = [];
    protected string $submitLabel = 'Submit';
    protected bool $csrf = true;
    protected array $errors = [];
    protected string $formClass = 'max-w-7xl mx-auto sm:px-6 lg:px-8';
    protected string $inputClass = 'w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow mb-2';
    protected string $submitButtonClass = 'w-full bg-blue-600 text-white p-2 rounded-md text-sm cursor-pointer mt-3';
    protected array $model = [];

    public function __construct($action = '', $method = 'POST', $errors = [], ?array $model = [])
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->errors = $errors;
        $this->model = $model;
    }

    public function disableCsrf(): static
    {
        $this->csrf = false;
        return $this;
    }

    public function setModel(array $data): static
    {
        $this->model = $data;
        return $this;
    }


    public function addField($type, $name, $label = '', $attributes = []): static
    {
        if (!empty($this->model) && array_key_exists($name, $this->model) && !isset($attributes['value'])) {
            $attributes['value'] = $this->model[$name];
        }

        $this->fields[] = compact('type', 'name', 'label', 'attributes');
        return $this;
    }

    public function addSelectField($name, $label, $tableName, $valueField = 'id', $textField = 'name', $attributes =
    []): static
    {
        $options = [];

        if ($tableName) {
            $items = DB::table($tableName)->get();
            $options = $items->pluck($textField, $valueField)->toArray();
        }

        if (!empty($this->model) && array_key_exists($name, $this->model)) {
            $attributes['selected'] = $this->model[$name];
        }

        $attributes['options'] = $options;
        return $this->addField('select', $name, $label, $attributes);
    }

    public function setSubmitLabel($label): static
    {
        $this->submitLabel = $label;
        return $this;
    }

    public function setFormClass($class): static
    {
        $this->formClass = $class;
        return $this;
    }

    public function setSubmitButtonClass($class): static
    {
        $this->submitButtonClass = $class;
        return $this;
    }

    public function render(): string
    {
        $form = "<form action='{$this->action}' method='{$this->method}' class='{$this->formClass}'>";

        if ($this->csrf && $this->method !== 'GET') {
            $form .= csrf_field();
        }

        foreach ($this->fields as $field) {
            $form .= "<div class='mb-4'>";

            if (!empty($field['label'])) {
                $form .= "<label class='text-gray-500 text-sm' for='{$field['name']}'>{$field['label']}</label>";
            }

            $attrs = $this->formatAttributes($field['attributes']);
            $errorClass = isset($this->errors[$field['name']]) ? 'border-red-500' : '';

            switch ($field['type']) {
                case 'textarea':
                    $value = $field['attributes']['value'] ?? '';
                    $form .= "<textarea name='{$field['name']}' id='{$field['name']}' class='{$this->inputClass} {$errorClass}' {$attrs}>{$value}</textarea>";
                    break;
                case 'select':
                    $form .= "<select name='{$field['name']}' id='{$field['name']}' class='{$this->inputClass} {$errorClass}' {$attrs}>";
                    foreach ($field['attributes']['options'] as $value => $option) {
                        $selected = ($field['attributes']['selected'] ?? '') == $value ? "selected" : "";
                        $form .= "<option value='{$value}' {$selected}>{$option}</option>";
                    }
                    $form .= "</select>";
                    break;
                case 'checkbox':
                    $checked = isset($field['attributes']['checked']) ? "checked" : "";
                    $form .= "<input type='checkbox' name='{$field['name']}' id='{$field['name']}' class='mr-2' {$attrs} {$checked}>";
                    $form .= "<label for='{$field['name']}'>{$field['label']}</label>";
                    break;
                default:
                    $form .= "<input type='{$field['type']}' name='{$field['name']}' id='{$field['name']}' class='{$this->inputClass} {$errorClass}' {$attrs}>";
                    break;
            }

            if (isset($this->errors[$field['name']])) {

                foreach ($this->errors[$field['name']] as $error)
                {
                    $form .= "<p class='text-red-500 text-xs mt-1'>{$error}</p>";
                }

            }

            $form .= "</div>";
        }

        $form .= "<input type='submit' class='{$this->submitButtonClass}' value='{$this->submitLabel}'/>";
        $form .= "</form>";

        return $form;
    }

    protected function formatAttributes($attributes): string
    {
        $formatted = '';
        foreach ($attributes as $key => $value) {
            if ($key !== 'options' && $key !== 'selected') {
                $formatted .= "{$key}='{$value}' ";
            }
        }
        return trim($formatted);
    }
}
