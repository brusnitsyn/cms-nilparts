<?php

return [

    'version' => 'v1',

    'middleware' => [
        'api'
    ],

    'route_prefix' => 'api',

    'endpoints' => [
        'index' => true,
        'blocks' => true,
        'media' => true,
        'files' => true,
        'features' => true,
        'tags' => true,
        'users' => true,
        'settings' => true,
    ],

    'related_types' => [
        // 'pages',
        // ...
        'products'
    ],

    'featured_types' => [
        // 'pages',
        // ...
    ],

];
