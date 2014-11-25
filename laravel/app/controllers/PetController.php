<?php

class PetController extends BaseController {

	// GET
	// ./api/pets
	// gets all rows from table
	public function index()
	{
		$pets = DB::table('pets')->get();

		$new_array = Array();
		foreach ($pets as $pt)
		{
			$imageID = DB::table('pettypes')->where('typeID', $pt->typeID)->first()->imageID;
			$happy = DB::table('images')->where('imageID', $imageID)->first()->happy;
			$pt = (object) array_merge((array)$pt, array( 'happy' => $happy ));
			array_push($new_array, $pt);
		}
 
    	return Response::json($new_array);
	}

	// GET
	// ./api/pets/[PETID]
	// gets one single row
	public function show($petID)
	{
		$pet = DB::table('pets')->where('petID', $petID)->first();
		return Response::json($pet);
	}

	// DELETE
	// ./api/pets/[PETID]
	// deletes a single row

	public function destroy($petID)
	{
		$username = DB::table('pets')->where('petID', $petID)->first()->username;
		$type = DB::table('pets')->where('petID', $petID)->first()->typeID
	 
	 	DB::table('pets')->where('petID', $petID)->delete();
	 	$old_money = DB::table('users')->where('username', $username)->first()->money;
	 	$pet_price = DB::table('pettypes')->where('typeID', $type)->first()->price;
	 	$new_money = $old_money - $pet_price;

	 	DB::table('users')->where('username', $username)->first()->update(array('money'=>$new_money));
    	return Response::json('success');
	}

	// GET
	// ./api/pets/buy?username=USERNAME&typeID=TYPEID&name=NAME
	public function Buy() 
	{
		$username = Input::get('username');
		$typeID = Input::get('typeID');

		$user = DB::table('users')->where('username', $username)->first();
		$pet_type = DB::table('pettypes')->where('typeID', $typeID)->first();

		// make sure user can afford it
		if ($user->money < $pet_type->price) 
		{
			return Response::json('You cannot afford this pet.');
		}
		// make sure user has unlocked it
		if (log($user->exp, 2) < $pet_type->unlock_level) 
		{
			return Response::json('You have not unlocked this pet.');
		}

		// subtract money from user, save
		$new_money = $user->money - $pet_type->price;
		DB::table('users')->where('username', $username)->update(array('money'=>$new_money));

		// create new pet, save
	    $pet = new Pet;
	   	$pet->typeID = $typeID;
	    $pet->username = $username;
	    $pet->name = Input::get('name');
	    $pet->happiness = '60';
	    $pet->cleanliness = '60';
	    $pet->fullness = '60';
	    $pet->exp = 0;
	    $pet->creationdate = new DateTime();

	    $pet->save();
	 
    	return Response::json('success');
	}

	// GET
	// ./api/pets/gethappyimage?petID=[petID]
	public function GetHappyImage()
	{
		$petID = Input::get('petID');

		$typeID = Pet::where('petID', $petID)->first()->typeID;

		$imageID = PetType::where('typeID', $typeID)->first()->imageID;

		$happy = Image::where('imageID', $imageID)->first()->happy;

		return Response::json($happy);
	}
}
