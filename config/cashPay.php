<?php

return [
    'auth' => [
        'UserName' => env('CASHPAY_MERCHANT_USERNAME'),
        'SpId' => env('CASHPAY_MERCHANT_SPID'),
        'encPassword' => env('CASHPAY_MERCHANT_ENCPASSWORD'),
    ],
    'cert' => [
        'path' => env('CASHPAY_CERT_PATH'),
        'password' => env('CASHPAY_CERT_PASSWORD'),
    ],
    'url' => [
        'base' => env('CASHPAY_BASE_URL', 'https://www.tamkeen.com.ye:33291'),
    ]
];
