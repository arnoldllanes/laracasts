@extends('app')

@section('content')

	<h2>All Users</h2>
	<hr>

	@foreach($users as $user)
		<p>
			<a href="{{ action('UserController@show', [$user->id]) }}">{{ $user->name }}</a>

		</p>
			
		@if(!$user->email)
			
			<p>No Email Provided</p>
		
		@endif
			
			<p>{{ $user->email }}</p>
	
	@endforeach

@stop