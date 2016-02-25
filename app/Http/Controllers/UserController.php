<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('loggedin', ['only' => 'create']);
    }


    public function index()
    {
    	$users = User::latest('name')->get();

    	return view('users.index')->with('users', $users);
    }


    public function store(UserRequest $request)
    {

    	User::create($request->all());

    	return redirect('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.user')->with('user', $user);

    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // dd(Auth::user());

        if(Auth::user() != $user) {
        
            return redirect('users');
        
        } else {

        return view('users.edit')->with('user', $user);

        }

    }

    public function update($id, UserRequest $request)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect('users');

    }        


}
