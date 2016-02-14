@extends('app')

@section('content')
<h2>Create User</h2>
<hr>

	{!! Form::open(['action' => 'UserController@store']) !!}
		
		@include('users.form', ['submitButtonText' => 'Create User'])
	
	{!! Form::close() !!}

		@include('errors.list')

@stop