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

// Route::get('/', function()
// {
// 	return View::make('home');
// });

// Route::get('/pet', function()
// {
// 	return View::make('pet');
// });

// Route::get('/petstore', function()
// {
// 	return View::make('petstore');
// });

// Route::get('/itemstore', function()
// {
// 	return View::make('itemstore');
// });

// // TODO: figure out how to pass parameter
// Route::get('/{username}', function()
// {
// 	return View::make('user');
// });

// // TODO: figure out how to pass parameter
// Route::get('/{username}/{petname}', function()
// {
// 	return View::make('user');
// });


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

