<?php

return [
    'auth' => [
        'UserName' => env('CASHPAY_MERCHANT_USERNAME'),
        'SpId' => env('CASHPAY_MERCHANT_SPID'),
        'encPassword' => env('CASHPAY_MERCHANT_ENCPASSWORD'),
    ],
    'url' => [
        'base' => env('CASHPAY_BASE_URL', 'https://www.tamkeen.com.ye:33291'),
    ]
];
