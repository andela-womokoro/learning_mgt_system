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
Route::get('/test', 'ViewsController@test');

Route::get('/', 'ViewsController@home');
Route::get('/playback/{id}', ['uses' => 'ViewsController@playback', 'as' => 'playback']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', ['uses' => 'ViewsController@dashboard', 'as' => 'dashboard']);
    Route::post('/dashboard/videos/add', 'ViewsController@addVideo');
    Route::get('/video/edit/{id}', 'ViewsController@getEditVideo');
    Route::post('/video/edit/{id}', 'ViewsController@postEditVideo');
    // Route::get('/video/delete/{id}', 'ViewsController@getDeleteVideo');
    Route::post('/video/delete/{id}', 'ViewsController@deleteVideo');
    Route::get('/profile', 'ViewsController@profile');
});

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
