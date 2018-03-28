<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('main');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::resource('/categories', 'CategoryController');
        Route::resource('/products', 'ProductController');
        Route::resource('/posts', 'PostController');
        Route::resource('/settings', 'SettingController');
    });
});
// Роут добавления продукта в корзину
Route::get('/add-to-cart/{id}', [
    'uses' => 'MainController@getAddToCart',
    'as' => 'product.addToCart'
]);

// Роут корзины
Route::get('/shopping-cart/', [
    'uses' => 'MainController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'MainController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
Route::get('/remove/{id}', [
    'uses' => 'MainController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);