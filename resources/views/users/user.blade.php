@extends('app')

@section('content')
	<h2>All Users</h2>

	@foreach($users as $user)
		<p>{{ $user->name }}</p>
		@if(!$user->email)
			<p>No Email Provided</p>
		@endif
			<p>{{ $user->email }}</p>
	@endforeach

	{!! Form::open(['url' => 'users']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Submit User', null, ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
@stop