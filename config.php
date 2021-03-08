<?php

return [
    'response' => [
        'driver' => 'daily',
        'path' => storage_path('logs/response/response.log'),
        'level' => 'info',
        'days' => 14,
    ]
];
