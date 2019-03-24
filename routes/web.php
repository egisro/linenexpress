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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index');
Route::get('/order', 'OrderController@order') -> name('order');
Route::get('/contact', 'ContactController@contact');
Route::post('/contact', 'ContactController@sendemail');
Route::get('/service', 'ServiceController@service');
Route::get('/commingsoon', 'ServiceController@commingsoon');
Route::get('/cart', 'CartController@index') -> name('cart.index');
Route::post('/cart', 'CartController@store') -> name('cart.store');

Route::match(['get', 'post'], '/admin', 'AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');

    // Clients Routes (Admin)
    Route::resource('/admin/clients', 'ClientController');

    // Memberships Routes (Admin)
    Route::resource('/admin/memberships', 'MembershipController');

    // Categories Routres (Admin)
    Route::resource('/admin/categories', 'CategoryController');

    // Products Routes
    Route::resource('/admin/products', 'ProductController');

});

Route::get('/logout', 'AdminController@logout');
