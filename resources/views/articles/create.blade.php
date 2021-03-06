@extends('app')

@section('content')
	<h1>Write A New Article</h1>

	<hr>
	
	{!! Form::open(['action' => 'ArticlesController@store']) !!}
		
		@include('articles.form', ['submitButtonText' => 'Add Article'])

	{!! Form::close() !!}

	@include('errors.list')
@stop