@extends('app')

@section('content')

	<h2>User: {{ $user->name }}</h2>

	@if(!$user->email)
	
		<p>{{ $user->name }} has no email</p>
	
	@else	
	
		<p>Email: {{ $user->email }}</p>
	
	@endif

	<h1>

		<a href="{{ action('UserController@show', $user->id) . '/edit' }}">click here to edit</a>
		
	</h1>
@stop