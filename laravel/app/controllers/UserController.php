<?php

class UserController extends BaseController {

	// GET
	// ./api/users
	// gets all rows from table
	public function index()
	{
		$user = User::where('username', $username)->first();
 
    	return Response::json($users);
	}

	// GET
	// ./api/users/[USERNAME]
	// gets one single row
	public function show($username)
	{
		$user = DB::table('users')->where('username', $username)->first();
		return Response::json($user);
	}

	// POST
	// ./api/users
	// saves single row
	public function store()
	{
	    $user = new User;
	    $user->username = Request::get('username');
	    $user->email = Request::get('email');
	    $user->password = Request::get('password');
	    $user->exp = '0';
	    $user->money = '100';
	 
	    $user->save();
	 
    	return Response::json('success');
	}

	// DELETE
	// ./api/users/[USERNAME]
	// deletes a single row

	public function destroy($username)
	{

		DB::table('users')->where('username', $username)->delete();
	 
    	return Response::json('success');
	}

	// GET
	// ./api/users/getallpets/[USERNAME]
	// gets all pet objects for the specified user
	public function GetAllPets($username)
	{
		$pets = DB::table('pets')->where('username', $username)->get();

		return Response::json($pets);
	}

	// GET
	// ./api/users/getallobjects/[USERNAME]
	// gets all pet objects for the specified user
	public function GetAllObjects($username)
	{
		$objects = DB::table('objectsowned')->where('username', $username)->get();

		return Response::json($objects);
	}
}
