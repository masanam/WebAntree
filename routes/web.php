<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', 'Admin\UsersController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', 'Admin\RolesController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('statuses', 'Admin\StatusesController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('lokets', 'Admin\LoketsController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('categories', 'Admin\CategoriesController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('hosts', 'Admin\HostsController', ["as" => 'admin']);
});
