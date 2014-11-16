<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Route::filter('auth.basic', function()
// {
//     return Auth::basic("username");
// });

Route::group(array('prefix' => 'api'/*, 'before' => 'auth.basic'*/), function() {
    Route::resource('pets', 'PetController');
});

Route::group(array('prefix' => 'api'/*, 'before' => 'auth.basic'*/), function() {
    Route::resource('objects', 'ObjectController');
});

Route::group(array('prefix' => 'api'/*, 'before' => 'auth.basic'*/), function() {
    Route::resource('images', 'ImageController');
});

Route::group(array('prefix' => 'api'/*, 'before' => 'auth.basic'*/), function() {
    Route::resource('users', 'UserController');
});

Route::group(array('prefix' => 'api'/*, 'before' => 'auth.basic'*/), function() {
    Route::resource('pettypes', 'PetTypeController');
});
