<?php

use Illuminate\Support\Facades\Route;

// Register Twill routes here eg.
Route::group(['prefix' => 'products'], function () {
//    Route::name('products.index')->get('index', [\App\Http\Controllers\Admin\ProductController::class, 'getForm']);
    Route::module('products');
    Route::module('productCategories');
});

Route::group(['prefix' => 'indexPage'], function () {
    Route::module('indices');
    Route::module('indexSlides');
    Route::module('indexBanners');
});
