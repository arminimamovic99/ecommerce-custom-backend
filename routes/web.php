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


Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

//Admin Middleware
Route::group(['middlewareGroups' => ['auth', 'admin']], function() {
    Route::get('/panel', 'HomeController@index');
    Route::post('/products/save', 'ProductsController@store');
    Route::get('/products/{id}/edit', 'ProductsController@edit');
    Route::post('/products/{id}/update', 'ProductsController@update');
    Route::get('/products/{id}/delete', 'ProductsController@destroy');
    Route::get('/categories/add', 'CategoriesController@create');
    Route::post('/categories/save', 'CategoriesController@store');
    Route::get('/categories/{id}/edit', 'CategoriesController@edit');
    Route::post('/categories/{id}/update', 'CategoriesController@update');
    Route::get('/categories/{id}/delete', 'CategoriesController@destroy');
    Route::get('/subcategories/create', 'SubcategoriesController@create');
    Route::post('/subcategories/store', 'SubcategoriesController@store');
    Route::get('/subcategories/{id}/edit', 'SubcategoriesController@edit');
    Route::post('/subcategories/{id}/update', 'SubcategoriesController@update');
    Route::get('/subcategories/{id}/delete', 'SubcategoriesController@destroy');
    Route::post('/orders/save/{id}', 'OrdersController@store');
    Route::get('/orders/delete/{id}', 'OrdersController@destroy');
    Route::get('/orders/new', 'OrdersController@newOrders');
    Route::get('/panel/categories', 'HomeController@categories');
    Route::get('/panel/orders', 'OrdersController@index');
    Route::get('/panel/subcategories', 'HomeController@subcategories');
    Route::get('/panel/pending', 'ApprovalProcessController@index');
    Route::get('/pending/{id}/approve', 'VendorController@store');
    Route::get('/pending/{id}/delete', 'ApprovalProcessController@delete');
    Route::get('/products/add', 'ProductsController@create');
});

// Vendor Middleware
Route::group(['middlewareGroups' => ['auth', 'vendor']], function() {
    Route::get('/vendor/orders', 'VendorController@showOrders');
    Route::get('/vendor/dashboard', 'VendorController@index');
    Route::post('/vendor/approve', 'ApprovalProcessController@store');
    Route::get('/pending/new', 'ApprovalProcessController@notifyVendor');
    Route::get('/vendor/add', 'VendorController@create');
    Route::get('/verify', 'CheckoutController@postRequest');
}); 

// Cart Routes:
Route::get('/cart/add/{id}', 'CartController@store');
Route::get('/cart/delete/{id}', 'CartController@delete');

// Homepage Routes:
Route::get('/fashion', 'DataController@fashion');
Route::get('/shop', 'ProductsController@index');
Route::get('/product/{id}', 'ProductsController@show');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/help', function(){
    return view('homepage/help');
});
Route::get('/checkout', 'CheckoutController@index');
Route::get('/products/all', 'ProductsController@index');
Route::get('/products/{id}', 'ProductsController@show');
Route::get('/about', function(){
    return view('homepage/about');
});
// Checkout Routes
Route::post('/charge', 'CheckoutController@charge');
Route::get('/', 'DataController@all');
Route::get('/payment/success', function(){
    echo 'Payment Succesful';
});
Route::get('/unauthorized', function(){
    return view('auth/unauthorized');
});
Route::get('/login', function() {
    return view('auth.login');
});

// Vendor Routes:
Route::get('/vendor/register', 'VendorRegistrationController@create');
Route::post('/vendor/register', 'RegistrationController@store');
Route::get('/vendor/login', 'VendorLoginController@create');
Route::post('/vendor/login', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('/checkout/vendor', 'CheckoutController@vendorPayout');
Route::get('/verify', 'CheckoutController@postRequest');
Route::get('/partnership', function() {
    return view('homepage/vendor_partnership');
});
// User Routes:
Route::get('/register', function(){
    return view('auth/register');
});
Route::get('/vendor/home', function(){
    return view('vendor/vendor_home');
});


Route::get('/vendor/logout', 'VendorLoginController@logout');


