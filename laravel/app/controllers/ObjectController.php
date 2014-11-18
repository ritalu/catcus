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

	// DELETE
	// ./api/objects/[OBJECTID]
	// deletes a single row

	public function destroy($objectID)
	{

		DB::table('objects')->where('objectID', $objectID)->delete();
	 
    	return Response::json('success');
	}

	// GET
	// ./api/objects/buy?username=[USERNAME]&objectID=[OBJECTID]
	public function Buy()
	{
		$username = Input::get('username');
		$objectID = Input::get('objectID');

		$user = User::where('username', $username)->first();
		$object = Object::where('objectID', $objectID)->first();

		if ($user->money < $object->price) {
			return Response::json('You cannot afford this item.');
		}

		// subtract money from user, save
		$user->money = $user->money - $object->price;

		$user->save();
				return Response::json($user);	

		$o = new ObjectsOwned;
		$o->username = $username;
		$o->objectID = $objectID;
		$o->uses_remaining = $object->uses_available;
		$o->save();

		return Response::json($o);
	}

	// GET
	// ./api/objects/use?petID=[PETID]&objectownedID=[OBJECTOWNEDID]
	public function UseOnPet()
	{
		$petID = Input::get('petID');
		$objectownedID = Input::get('objectownedID');


		$pet = Pet::where('petID', $petID)->first();
		$object_owned = ObjectsOwned::where('objectownedID', $objectownedID)->first();

		// decrement uses remaining
		$object_owned->uses_remaining = $object_owned->uses_remaining - 1;

		$object = Object::where('objectID', $objectID)->first();
		$increased_attribute = $object->need_fulfilled;
		$number = $object->rate_of_fulfillment;

		$pet->$increased_attribute = $pet->$increased_attribute + $number;

		//$pet->save();

		if ($object_owned->uses_remaining == 0)
		{
			//$object_owned->delete();
		}
		else
		{
			//$object_owned->save();
		}

		return Response::json('success');
	}
}
