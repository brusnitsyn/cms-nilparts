<?php

return [
    'front' => [
        'title' => 'Фронт',
        'route' => 'admin.front.indexBanners.index',
        'primary_navigation' => [
            'indexBanners' => [
              'title' => 'Баннер акций',
              'module' => true
            ],
            'indexSlides' => [
                'title' => 'Слайдер',
                'module' => true
            ],
            'blogs' => [
                'title' => 'Новости',
                'module' => true,
            ],
        ]
    ],
    'products' => [
        'title' => 'Товары',
        'route' => 'admin.products.products.index',
        'primary_navigation' => [
            'products' => [
                'title' => 'Товары',
                'module' => true
//                'route' => 'admin.products.products.index',
            ],
            'productCategories' => [
                'title' => 'Категории',
                'module' => true,
            ],
        ]
    ],
];
