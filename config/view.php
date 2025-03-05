<?php

return [
    'paths' => [
        base_path('app/Application/Views'),
        base_path('resources'),
    ],
    'compiled' => realpath(storage_path('framework/views')),
];
