<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();


Route::post('/admin/login', 'Admin\AuthController@login');
Route::get('/admin/login',  'Admin\AuthController@showLoginForm');
Route::get('/admin/logout', 'Admin\AuthController@logout');

Route::get('/admin', 'Admin\AdminController@index');
Route::get('/admin/Pages', 'Admin\PagesController@index');
Route::delete('/admin/Pages/Delete/{id}', 'Admin\PagesController@delete');

Route::get('/{slug?}', 'PagesController@show');
