<?php

class UserController extends BaseController {
	
	// GET
	// ./api/users
	// gets all rows from table
	public function index()
	{
		$users = DB::table('users')->get();
 
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
}
