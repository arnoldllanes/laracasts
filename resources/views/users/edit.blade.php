@extends('app')

@section('content')
	
	<h1>Edit: {!! $user->name !!}'s profile</h1>

	{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
		@include('users.form', ['submitButtonText' => 'Update User'])
	{!! Form::close() !!}

	@include('errors.list')

@stop

