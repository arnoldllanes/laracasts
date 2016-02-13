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
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Submit User', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

	@if($errors->any())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</div>
	@endif
@stop