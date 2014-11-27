<?php

class ObjectController extends BaseController {

	// GET
	// ./api/objects
	// gets all rows from table
	public function index()
	{
		$objects = DB::table('objects')->orderby('unlock_level', 'asc')->orderby('name', 'asc')->get();
 
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

		$user = DB::table('users')->where('username', $username)->first();
		$object = DB::table('objects')->where('objectID', $objectID)->first();

		if ($user->money < $object->price) {
			return Response::json('You cannot afford this item.');
		}

		// make sure user has unlocked it
		if (log($user->exp, 2) < $object->unlock_level) 
		{
			return Response::json('You have not unlocked this item.');
		}

		// subtract money from user, save
		$new_money = $user->money - $object->price;
		DB::table('users')->where('username', $username)->update(array('money'=>$new_money));	

		$o = new ObjectsOwned;
		$o->username = $username;
		$o->objectID = $objectID;
		$o->uses_remaining = $object->uses_available;
		$o->save();

		return Response::json('success');
	}

	// GET
	// ./api/objects/use?petID=[PETID]&objectownedID=[OBJECTSOWNEDID]
	public function UseOnPet()
	{
		$petID = Input::get('petID');
		$objectownedID = Input::get('objectsownedID');

		$pet = DB::table('pets')->where('petID', $petID)->first();
		$object_owned = DB::table('objectsowned')->where('objectsownedID', $objectownedID)->first();		
		$object = DB::table('objects')->where('objectID', $object_owned->objectID)->first();

		// check if the item is right for the pet
		$for_pet_types = DB::table('objectforpet')->where('objectID', $object->objectID)->where("typeID", $pet->typeID)->get();

		if ($for_pet_types == null)
		{
			return Response::json('You cannot use this item on this type of pet.');
		}		

		// update the corresponding attribute in the pet
		$increased_attribute = strtolower($object->need_fulfilled);
		$number = $object->rate_of_fulfillment;

		$pet->$increased_attribute = $pet->$increased_attribute + $number;
		$new_number = $pet->$increased_attribute;
		
		// don't let attribute go above 100
		if ($new_number > 100)
		{
			$new_number = 100;
		}
				
		DB::table('pets')->where('petID', $petID)->update(array($increased_attribute=>$new_number));


		// decrement uses remaining if the object isn't a permanent one
		if ($object_owned->uses_remaining != -1)
		{
			$new_uses = $object_owned->uses_remaining - 1;
			DB::table('objectsowned')->where('objectsownedID', $objectownedID)->update(array('uses_remaining'=>$new_uses));

			// delete item if its uses = 0
			if ($new_uses == 0)
			{
				DB::table('objectsowned')->where('objectsownedID', $objectownedID)->delete();
			}
		}

		// give user one exp
		$original_exp = DB::table('users')->where('username', $pet->username)->first()->exp;
		$old_level = floor(log($original_exp, 2));
		$new_exp = $original_exp + 1;
		$new_level = floor(log($new_exp, 2));
		DB::table('users')->where('username', $pet->username)->update(array('exp'=>$new_exp));

		//if user advances level, give money
		//return Response::json(array($old_level => $new_level));

		if ($old_level < $new_level)
		{
			$old_money = DB::table('users')->where('username', $pet->username)->first()->money;
			$new_money = $old_money + $new_level * 1500;
			DB::table('users')->where('username', $pet->username)->update(array('money'=>$new_money));
		}
		

		return Response::json('success');
	}
}
