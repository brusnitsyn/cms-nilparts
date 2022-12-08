<?php

return [
    'indexPage' => [
        'title' => 'Главная',
        'route' => 'admin.indexPage.indexBanners.index',
        'primary_navigation' => [
            'indexBanners' => [
              'title' => 'Баннер акций',
              'module' => true
            ],
            'indexSlides' => [
                'title' => 'Слайдер',
                'module' => true
            ]
        ]
    ],
    'products' => [
        'title' => 'Товары',
        'route' => 'admin.products.products.index',
        'primary_navigation' => [
            'landing' => [
                'title' => 'Товары',
                'route' => 'admin.products.products.index',
            ],
            'productCategories' => [
                'title' => 'Категории',
                'module' => true,
            ],
        ]
    ],
];
