<?php

namespace App\Helpers;

class FormAttribute
{
    protected function formatAttributes($attributes): string
    {
        $formatted = '';
        foreach ($attributes as $key => $value) {
            if (!in_array($key, ['options', 'selected'])) {
                $formatted .= "{$key}='{$value}' ";
            }
        }
        return trim($formatted);
    }
}
