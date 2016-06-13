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
    return view('templates/home');
});

//Route::auth();


Route::post('/cfadmin/login', 'Admin\AuthController@login');
Route::get('/cfadmin/login',  'Admin\AuthController@showLoginForm');
Route::get('/cfadmin/logout', 'Admin\AuthController@logout');

Route::get('/cfadmin', 'Admin\AdminController@index');

Route::get('/cfadmin/Settings', 'Admin\SettingsController@index');
Route::get('/cfadmin/Stats', 'Admin\StatsController@index');

Route::get('/cfadmin/Pages', 'Admin\PagesController@index');
Route::post('/cfadmin/Pages', 'Admin\PagesController@store');
Route::post('/cfadmin/Pages/SaveOrder', 'Admin\PagesController@saveOrder');
Route::post('/cfadmin/Pages/SaveStatus', 'Admin\PagesController@saveStatus');
Route::post('/cfadmin/Pages/Delete', 'Admin\PagesController@delete');
Route::get('/cfadmin/Pages/Edit/{id}', 'Admin\PagesController@edit');
Route::post('/cfadmin/Pages/Edit/{id}', 'Admin\PagesController@update');
Route::get('/cfadmin/Pages/Edit/{id}/Content', 'Admin\PagesController@editContent');
Route::post('/cfadmin/Pages/Edit/{id}/Content', 'Admin\PagesController@updateContent');
Route::get('/cfadmin/Pages/Edit/{id}/Image', 'Admin\PagesController@editImage');
Route::post('/cfadmin/Pages/Edit/{id}/Image', 'Admin\PagesController@updateImage');

Route::get('/{slug?}', 'PagesController@show')
    ->where(['slug' => '.*']);
