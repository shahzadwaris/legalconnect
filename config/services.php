<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'stripe' => [
        'publishable'   => env('STRIPE_PUBLISHABLE_KEY'),
        'secret'        => env('STRIPE_SECRET'),
        'product1'      => env('STRIPE_PRODUCT_1'),
        'product2'      => env('STRIPE_PRODUCT_2'),
    ],
    'plaid' => [
        'PLAID_CLIENT_ID'   => env('PLAID_CLIENT_ID'),
        'PLAID_SECRET'      => env('PLAID_SECRET'),
        'PLAID_LINK'        => env('PLAID_LINK'),
    ],
];
