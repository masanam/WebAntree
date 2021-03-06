<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', 'Admin\UserAPIController');
    Route::post('/getUserProfile', 'Admin\UserAPIController@getUserProfile');

});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', 'Admin\RolesAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('statuses', 'Admin\StatusesAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('lokets', 'Admin\LoketsAPIController');
    Route::post('/getLoketbyCat', 'Admin\LoketsAPIController@getLoketbyCat');

});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('categories', 'Admin\CategoriesAPIController');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('hosts', 'Admin\HostsAPIController');
    Route::post('/getHostbyCat', 'Admin\HostsAPIController@getHostbyCat');


});

Route::post('/login', 'Admin\AuthAPIController@login');

Route::post('/signup', 'Admin\AuthAPIController@signup');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('sliders', 'Admin\SlidersAPIController');
});
