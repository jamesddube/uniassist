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


/*
|--------------------------------------------------------------------------
| Start of Auth Routes
|--------------------------------------------------------------------------
*/

// Password reset link request routes...
use Illuminate\Http\Request;

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Authentication routes...
Route::get('auth', 'Auth\AuthController@getLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
|--------------------------------------------------------------------------
| End of Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/','UserController@index');
Route::get('/about', function () {
    return view('student.about');
});

Route::post('/results', 'UserController@results');

Route::group(['middleware' => 'auth'],function() {

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', 'AdminController@index');
        Route::resource('subjects', 'SubjectsController');
        Route::resource('programs', 'ProgramsController');

    });
});
