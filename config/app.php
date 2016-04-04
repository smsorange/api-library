<?php

return [

    'Cruise' => [

        /*
        |--------------------------------------------------------------------------
        | API Service URL
        |--------------------------------------------------------------------------
        |
        | This URL is an Api endpoint for the specific service.
        | All service related requests will be passed to
        | this address.
        |
        */

        'url' => 'http://testing.orangetravelgroup.com/crawlertest/crawler/cruises/',

        /*
        |--------------------------------------------------------------------------
        | API Response Type
        |--------------------------------------------------------------------------
        |
        | This is the response format you want the API to return.
        |
        */

        'response_type' => 'json',

        /*
        |--------------------------------------------------------------------------
        | Service methods map
        |--------------------------------------------------------------------------
        |
        | These are the mapped methods of all booking steps, which should be
        | appended to the main service endpoint.
        |
        */

        'methods' => [
            'search' => 'show-cruises/',
            'select' => '',
            'getComponents' => 'get-components/',
            'getAvailableCategories' => 'get-available-categories/',
            'getCabins' => 'get-cabins/',
            'getQuote' => 'get-quote/',
            'holdCabin' => 'hold-cabin/',
            'book' => 'booking/',
        ],

        'webservices' => [
            0 => 'Cruise',
            21 => 'CostaCruisesWebservice',
            162 => 'ManualCruisesWebservice',
        ]
    ],

    'Tour' => [
        'url' => 'http://testing.orangetravelgroup.com/crawlertest/crawler/tours/',
        'response_type' => 'json',
        'methods' => [
            'search' => 'show-tours/',
            'select' => '',
        ]
    ]
];
