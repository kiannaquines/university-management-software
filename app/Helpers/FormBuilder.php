<?php

namespace App\Helpers;

use Illuminate\Support\HtmlString;

abstract class FormBuilder extends FormAttribute
{
    protected string $method;
    protected string $action;
    protected array $inputs = [];
    protected bool $csrf = true;
    protected array $errors = [];
    protected string $inputClass = '';

    public function __construct(string $action = '', string $method = 'POST', array $errors = [])
    {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->errors = $errors;
    }

    public function disableCsrf(): static
    {
        $this->csrf = false;
        return $this;
    }

    public function addField(string $type, string $name, ?string $label = '', array $attributes = []): static
    {
        $this->inputs[] = compact('type', 'name', 'label', 'attributes');
        return $this;
    }

    public function addSelectField(string $name, string $label, array $options, array $attributes = []): static
    {
        $attributes['options'] = $options;
        return $this->addField('select', $name, $label, $attributes);
    }

    public function render(): HtmlString
    {
        $form = "";

        if ($this->csrf && $this->method !== 'GET') {
            $form .= csrf_field();
            if (!in_array($this->method, ['GET', 'POST'])) {
                $form .= method_field($this->method);
            }
        }

        foreach ($this->inputs as $input) {
            $form .= "<div class='mb-4'>";

            if (!empty($input['label'])) {
                $form .= "<label class='text-gray-500 text-sm' for='{$input['name']}'>{$input['label']}</label>";
            }

            $attrs = $this->formatAttributes($input['attributes']);
            $errorClass = isset($this->errors[$input['name']]) ? 'border-red-500' : '';

            switch ($input['type']) {
                case 'textarea':
                    $value = $input['attributes']['value'] ?? '';
                    $form .= "<textarea name='{$input['name']}' id='{$input['name']}' class='{$this->inputClass} {$errorClass}' {$attrs}>{$value}</textarea>";
                    break;
                case 'select':
                    $form .= "<select name='{$input['name']}' id='{$input['name']}' class='{$this->inputClass} {$errorClass}' {$attrs}>";
                    foreach ($input['attributes']['options'] as $value => $option) {
                        $selected = ($input['attributes']['selected'] ?? '') == $value ? "selected" : "";
                        $form .= "<option value='{$value}' {$selected}>{$option}</option>";
                    }
                    $form .= "</select>";
                    break;
                case 'checkbox':
                    $checked = isset($input['attributes']['checked']) ? "checked" : "";
                    $form .= "<input type='checkbox' name='{$input['name']}' id='{$input['name']}' class='rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500' {$attrs} {$checked}>";
                    $form .= "<label for='{$input['name']}'>{$input['label']}</label>";
                    break;
                default:
                    $form .= "<input type='{$input['type']}' name='{$input['name']}' id='{$input['name']}' class='{$this->inputClass} {$errorClass}' {$attrs}>";
                    break;
            }

            if (isset($this->errors[$input['name']])) {
                foreach ($this->errors[$input['name']] as $error) {
                    $form .= "<p class='text-red-500 text-xs mt-1'>{$error}</p>";
                }
            }

            $form .= "</div>";
        }

        return new HtmlString($form);
    }
}
