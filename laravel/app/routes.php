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

// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });

Route::group(array('prefix' => 'api'/*, 'before' => 'auth.basic'*/), function() {

	Route::get('/users/getallpets/{username}', 'UserController@GetAllPets');
	Route::get('/users/getallobjects/{username}', 'UserController@GetAllObjects');

	Route::get('/pets/buy', 'PetController@Buy');
	Route::get('/pets/gethappyimage', 'PetController@GetHappyImage');

	Route::get('/objects/buy', 'ObjectController@Buy');
	Route::get('/objects/use', 'ObjectController@UseOnPet');
	
    Route::resource('pets', 'PetController');
    Route::resource('objects', 'ObjectController');
    Route::resource('images', 'ImageController');
    Route::resource('users', 'UserController');
    Route::resource('pettypes', 'PetTypeController');
});

