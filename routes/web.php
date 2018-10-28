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
    return view('welcome');
});
//Route::resource('/admin/user', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace'=>'Admin'],function(){

	Route::get('/admin/login', 'AdminAuth@login');
	Route::resource('/admin/users', 'UserController');
	Route::resource('/admin/products', 'ProductController');
	Route::resource('/admin/orders', 'OrderController');

});