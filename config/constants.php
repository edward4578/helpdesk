<?php

return [
    'PROCESS_STATES' => [
        'OK' => 100,
        'ERROR_DATA_VALIDATION' => 101,
        'ERROR_DATA_NOT_FOUND' => 102,
        'ERROR_SQL_EXECUTION' => 103
    ],
    'HTTP_STATUS' => [
        'OK' => 200,
        'CREATED' => 201,
        'NO_CONTENT' => 204,
        'NO_MODIFIED' => 304,
        'BAD_REQUEST' => 400,
        'UNAUTHORIZED' => 401,
        'FORBIDDEN' => 403,
        'NOT_FOUND' => 404,
        'METHOD_NOT_ALLOWED' => 405,
        'GONE' => 410,
        'UNSSUPPORTED_MEDIA_TYPE' => 415,
        'UNPROCESSABLE_ENTITY' => 422,
        'TOO_MANY_REQUESTS' => 429,
    ],
    'DOMAIN' => [
        'CARD_TYPE' => [
            'MASTERCARD' => 1,
            'VISA' => 2
        ],
        'CURRENCY' => [
            'COP' => 1,
            'USD' => 2
        ]
    ],
    'TEMPORAL' => [
        'COD_COMPANY' => 1,
        'COD_CLIENT' => 1
    ],
    'GROUP' => [
        'NAME' => 'Mi grupo'
    ],
    'PAGINATION' => [
        'PER_PAGE_MENUS' => 10
    ]
];
