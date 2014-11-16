<?php

class ObjectController extends BaseController {

	// GET
	// ./api/objects
	// gets all rows from table
	public function index()
	{
		$objects = DB::table('objects')->get();
 
    	return Response::json($objects);
	}

	// GET
	// ./api/objects/[OBJECTID]
	// gets one single row
	public function show($objectID)
	{
		$object = DB::table('objects')->where('objectID', $objectID)->first();
		return Response::json($object);
	}

	// POST
	// ./api/objects
	// saves single row
	public function store()
	{
	    $object = new Object;
	    $object->name = Request::get('name');
	    $object->need_fulfilled = Request::get('need_fulfilled');
	    $object->rate_of_fufillment = Request::get('rate_of_fufillment');
	    $object->price = Request::get('price');
	    $object->uses_available = Request::get('uses_available');
	    $object->image = Request::get('image');
 
	    $image->save();
	 
    	return Response::json('success');
	}

	// DELETE
	// ./api/objects/[OBJECTID]
	// deletes a single row

	public function destroy($objectID)
	{

		DB::table('objects')->where('objectID', $objectID)->delete();
	 
    	return Response::json('success');
	}
}
