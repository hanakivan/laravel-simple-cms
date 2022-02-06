<?php

return [
    "route" => [
        "prefix" => env("hanakivan.route.prefix", \hanakivan\LaravelSimpleCms\app\Http\Controllers\LaravelSimpleCMSController::DEFAULT_ROUTE_PREFIX),
    ],
    "listing" => [
        "perPage" => env("hanakivan.listing.perPage", 10),
    ]
];
