<?php

class PetController extends BaseController {

	// GET
	// ./api/pets
	// gets all rows from table
	public function index()
	{
		$pets = DB::table('pets')->get();
 
    	return Response::json($pets);
	}

	// GET
	// ./api/pets/[PETID]
	// gets one single row
	public function show($petID)
	{
		$pet = DB::table('pets')->where('petID', $petID)->first();
		return Response::json($pet);
	}

	// POST
	// ./api/pets
	// saves single row
	public function store()
	{
	    $pet = new Image;
	    $pet->typeID = Request::get('typeID');
	    $pet->username = Request::get('username');
	    $pet->name = Request::get('name');
	    $pet->happiness = Request::get('happiness');
	    $pet->cleanliness = Request::get('cleanliness');
	    $pet->fullness = Request::get('fullness');
	    $pet->exp = Request::get('exp');

	    $pet->save();
	 
    	return Response::json('success');
	}

	// DELETE
	// ./api/pets/[PETID]
	// deletes a single row

	public function destroy($petID)
	{
		DB::table('pets')->where('petID', $petID)->delete();
	 
    	return Response::json('success');
	}
}
