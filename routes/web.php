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
    Route::match(['get', 'post'], '/admin/add-client', 'ClientController@create');
    Route::match(['get', 'post'], '/admin/edit-client/{id}', 'ClientController@editClient');
    Route::match(['get', 'post'], '/admin/delete-client/{id}', 'ClientController@deleteClient');
    Route::get('/admin/view-clients', 'ClientController@index');

    // Memberships Routes (Admin)
    Route::match(['get', 'post'], '/admin/add-membership', 'MembershipController@create');
    Route::match(['get', 'post'], '/admin/edit-membership/{id}', 'MembershipController@editClient');
    Route::match(['get', 'post'], '/admin/delete-membership/{id}', 'MembershipController@deleteClient');
    Route::get('/admin/view-memberships', 'MembershipController@index');

    // Categories Routres (Admin)
    Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
    Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
    Route::match(['get', 'post', 'delete'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
    Route::get('/admin/view-categories', 'CategoryController@viewCategories');

    // Products Routes
    Route::match(['get', 'post'], '/admin/add-product', 'ProductController@addProduct');
    Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductController@editProduct');
    Route::get('/admin/view-products', 'ProductController@viewProducts');
    Route::get('/admin/delete-product/{id}', 'ProductController@deleteProduct');
    Route::get('/admin/delete-product-image/{id}', 'ProductController@deleteProductImage');

});

Route::get('/logout', 'AdminController@logout');
