<?php

return [

    'base_url' => env('ADAPTY_BASE_URL', 'https://api.adapty.io/api/v1/sdk'),

    'secret_token' => env('ADAPTY_SECRET_TOKEN'),

    'webhook' => [
        'path' => env('ADAPTY_WEBHOOK_PATH', '/adapty/webhook'),
        'middleware' => [],
        'reject_if_customer_user_id_is_null' => false,
    ],

];
