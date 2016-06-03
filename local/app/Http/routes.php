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
    return view('home');
});

//Route::auth();


Route::post('/admin/login', 'Admin\AuthController@login');
Route::get('/admin/login',  'Admin\AuthController@showLoginForm');
Route::get('/admin/logout', 'Admin\AuthController@logout');

Route::get('/admin', 'Admin\AdminController@index');

Route::get('/admin/Pages', 'Admin\PagesController@index');
Route::get('/admin/Pages/Edit/{id}', 'Admin\PagesController@edit');
Route::post('/admin/Pages/Edit/{id}', 'Admin\PagesController@update');
Route::get('/admin/Pages/Edit/{id}/Content', 'Admin\PagesController@editContent');
Route::post('/admin/Pages/Edit/{id}/Content', 'Admin\PagesController@updateContent');
Route::get('/admin/Pages/Edit/{id}/Image', 'Admin\PagesController@editImage');
Route::post('/admin/Pages/Edit/{id}/Image', 'Admin\PagesController@updateImage');
Route::delete('/admin/Pages/Delete/{id}', 'Admin\PagesController@delete');

Route::get('/{slug?}', 'PagesController@show');
