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

Route::get('/', function () {
    return view('index');
});

Route::get('bag', function () {
    return view('bag');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('casuals', function () {
    return view('casuals');
});

Route::get('travelling', function () {
    return view('travelling');
});

Route::get('women', function () {
    return view('women');
});

Route::get('check', function () {
    return view('check');
});

Route::get('list', function () {
    return view('list');
});

Route::get('order', function () {
    return view('order');
});

Route::get('admin', function () {
    return view('admin.admin');
});

Route::get('jenistas/{jenistas}', 'FrontendController@jenistas');

Route::resource('/cart', 'CartController');

Route::get('/checkout', function () {
    return view('frontend.checkout');
});

Route::post('/formcart', 'Ecommerce\CartController@addToCart');
Route::post('/formcart-update', 'Ecommerce\CartController@updateCart');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', 'HomeController@index');

    // Route::get('/user', 'UserController@index');
    // Route::post('/user-store', 'UserController@store');
    // Route::delete('/user-destroy/{id}', 'UserController@destroy');

    Route::resource('/customer', 'CustomerController');

    Route::resource('/jenistas', 'JenistasController');

    Route::resource('/bahantas', 'BahantasController');

    Route::resource('/detailtas', 'DetailtasController');

    // Route::get('/stokmasuk', 'StokmasukController@index');
    // Route::post('/stokmasuk-store', 'StokmasukController@store');
    // Route::get('/stokmasuk/{id}/edit', 'StokmasukController@edit');
    // Route::delete('/stokmasuk-destroy/{id}', 'StokmasukController@destroy');

    Route::get('/order', 'OrderController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontendController@home');
