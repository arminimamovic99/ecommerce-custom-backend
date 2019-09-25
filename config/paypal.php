<?php
return [ 
    'username' => env('PAYPAL_SANDBOX_API_USERNAME','aimamovic99-facilitator_api1.outlook.com'),
    'password' => env('PAYPAL_SANDBOX_API_PASSWORD', 'U9BP2G7E3LDH7JBU'),
    'client_id' => env('PAYPAL_CLIENT_ID','AfTGhfvfONwRF-55LBG8Yr2AjNUmuOexxxrjPiJ4Nb_v8_foLeWz7LmHCT7M3SyE3rd6ejbiJc9f2QoJ'),
    'secret' => env('PAYPAL_SECRET','EJnr4X7dO0ZwcZZa2E9G8soRFsg61druXUJN58APk4S0Zi6NMmh3bkdgXig7lA9xoavASp1GXM7bJNo3'),
    'signature' => env('PAYPAL_SANDBOX_API_SIGNATURE', 'A.BwxD6G21oXe0-yD9nuJh9zlhPQAogo-88Znh9FhTXgSOb3WrR9Jl6Z'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];