<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\OrgController;
use App\Http\Controllers\API\v1\OrgTypeController;
use App\Http\Controllers\API\v1\OrgUserController;
use App\Http\Controllers\API\v1\UserController;
use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\API\v1\ProductCategoryController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('user', [AuthController::class, 'me']);
//
//Route::group([
//    'middleware' => ['api', 'auth:api'],
//    'prefix' => 'auth'
//], function ($router) {
//    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);
//    Route::post('logout', [AuthController::class, 'logout']);
//    Route::post('refresh', [AuthController::class, 'refresh'])->withoutMiddleware(['auth:api']);
//    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware(['auth:api']);
//});

Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', [AuthController::class, 'me']);

    Route::post('/auth/logout', [AuthController::class, 'logout']);
});


// Verify email
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

// Resend link to verify email
Route::post('/email/verify/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:sanctum', 'throttle:6,1'])->name('verification.send');

// Route::prefix('auth')->group(function () {
//     Route::post('login-email', [AuthController::class, 'loginWithEmail']);

// });

Route::apiResources([
    'org' => OrgController::class,
    'users' => UserController::class,
    'org-types' => OrgTypeController::class,
    'org-users' => OrgUserController::class,
    'products' => ProductController::class,
    'categories' => ProductCategoryController::class,
    'orders' => \App\Http\Controllers\API\v1\OrderController::class,
    'units' => \App\Http\Controllers\API\v1\UnitController::class,
    'home' => \App\Http\Controllers\API\v1\HomeController::class,
    'slides' => \App\Http\Controllers\API\v1\SlideController::class,
    'advert' => \App\Http\Controllers\API\v1\AdvertisingBannerController::class,
    'blog' => \App\Http\Controllers\API\v1\BlogController::class,
    'contacts' => \App\Http\Controllers\API\v1\ContactsController::class,
    'basket' => \App\Http\Controllers\API\v1\BasketController::class,
]);

// Route::post('blog/uploadImage', [\App\Http\Controllers\API\v1\BlogController::class, 'uploadImage']);
Route::get('products/{product:slug}', [ProductController::class, 'showSlug']);
// Route::get('users/{id}/products', [UserController::class, 'products']);
// Route::get('users/{id}/basket', [UserController::class, 'basket']);
// Route::get('blog/{blog:slug}', [\App\Http\Controllers\API\v1\BlogController::class, 'show']);
// Route::get('cart/order', [\App\Http\Controllers\API\v1\UserCartController::class, 'order']);
// Route::get('orders/{id}/download', [\App\Http\Controllers\API\v1\OrderController::class, 'download']);
// Route::delete('basket', [\App\Http\Controllers\API\v1\BasketController::class, 'destroy']);

// Route::get('/products-org', [ProductController::class, 'getProductByOrgId']);

//JsonApiRoute::server('v1')
//    ->prefix('v1')
//    ->namespace('Api\V1')
//    ->resources(function ($server) {
//        $server->resource('users', '\\' . JsonApiController::class);
//
//        $server->resource('product-categories', '\\' . JsonApiController::class)
//            ->relationships(function ($relations) {
//                $relations->hasMany('products');
//            });
//        $server->resource('products', '\\' . JsonApiController::class)
//            ->relationships(function ($relations) {
//            //     $relationships->hasMany('blocks');
//                $relations->hasMany('media');
////                $relations->hasOne('product-categories');
//            });
//    });
