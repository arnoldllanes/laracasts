<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function getUsers()
    {
    	$users = User::latest('name')->name()->get();

    	return view('users.user')->with('users', $users);
    }


    public function postUsers(CreateUserRequest $request)
    {

    	User::create(Request::all());

    	return redirect('users');
    }

}
