<?php

class PetTypeController extends BaseController {

	// GET
	// ./api/pettypes
	// gets all rows from table
	public function index()
	{
		$pettypes = DB::table('pettypes')->get();
 
    	return Response::json($pettypes);
	}

	// GET
	// ./api/pets/[PETID]
	// gets one single row
	public function show($typeID)
	{
		$pettype = DB::table('pettypes')->where('typeID', $typeID)->first();
		return Response::json($pettype);
	}

	// POST
	// ./api/pets
	// saves single row
	public function store()
	{
	    $pettype = new Image;
	    $pettype->rate_decrease_hap = Request::get('rate_decrease_hap');
	    $pettype->rate_decrease_full = Request::get('rate_decrease_full');
	    $pettype->rate_decrease_clean = Request::get('rate_decrease_clean');
	    $pettype->unlock_level = Request::get('unlock_level');
	    $pettype->price = Request::get('price');
	    $pettype->imageID = Request::get('imageID');

	    $pet->save();
	 
    	return Response::json('success');
	}

	// DELETE
	// ./api/pets/[PETID]
	// deletes a single row

	public function destroy($typeID)
	{
		DB::table('pettypes')->where('typeID', $typeID)->delete();
	 
    	return Response::json('success');
	}
}
