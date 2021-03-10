<?php

return [
    'enable' => env('RESPONSE_LOGGING_ENABLE', true),

    // merge config logging.channels
    'channels' => [
        'response' => [
            'driver' => 'daily',
            'path' => storage_path('logs/response/response.log'),
            'level' => 'info',
            'days' => 14,
        ],
    ]
];
