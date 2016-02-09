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

Route::get('/', 'ViewsController@home');
Route::get('/videos/{category}', 'VideosController@videoCategories');
Route::get('/playback/{id}', ['uses' => 'VideosController@playback', 'as' => 'playback']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Social media authentication routes...
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', ['uses' => 'ViewsController@dashboard', 'as' => 'dashboard']);
    Route::get('/videos/add/new', 'VideosController@getAddVideo');
    Route::post('/videos/add/new', 'VideosController@postAddVideo');
    Route::get('/video/edit/{id}', 'VideosController@getEditVideo');
    Route::post('/video/edit/{id}', 'VideosController@postEditVideo');
    Route::post('/video/delete/{id}', 'VideosController@deleteVideo');
    Route::get('/profile', 'UsersController@profile');
    Route::post('/profile/update', 'UsersController@updateProfile');
    Route::post('/profile/update/avatar', 'UsersController@updateAvatar');
});

Route::controllers([
   'password' => 'Auth\PasswordController',
]);
