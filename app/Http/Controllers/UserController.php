<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getUsers()
    {
    	$users = User::all();

    	return view('users.user')->with('users', $users);
    }

    public function postUsers()
    {
    	$input = Request::all();

    	$input['password'] = 'Pass';

    	User::create($input);

    	return redirect('users');
    }

}
