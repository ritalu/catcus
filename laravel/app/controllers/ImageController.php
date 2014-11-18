<?php

class ImageController extends BaseController {

	// GET
	// ./api/images
	// gets all rows from table
	public function index()
	{
		$images = DB::table('images')->get();
 
    	return Response::json($images);
	}

	// GET
	// ./api/images/[IMAGEID]
	// gets one single row
	public function show($imageID)
	{
		$image = DB::table('images')->where('imageID', $imageID)->first();
		return Response::json($image);
	}

	// POST
	// ./api/images
	// saves single row
	public function store()
	{
	    $image = new Image;
	    $image->happy = Request::get('happy');
	    $image->sad = Request::get('sad');
	    $image->dead = Request::get('dead');
	 
	    $image->save();
	 
    	return Response::json('success');
	}

	// DELETE
	// ./api/images/[IMAGEID]
	// deletes a single row
	public function destroy($imageID)
	{

		DB::table('images')->where('imageID', $imageID)->delete();
	 
    	return Response::json('success');
	}

	// GET
	// ./api/images/gethappyimage/[IMAGEID]
	// gets one single row
	public function GetHappyImage($imageID)
	{
		$image = DB::table('images')->where('imageID', $imageID)->first();
		return Response::json($image->happy);
	}

}
