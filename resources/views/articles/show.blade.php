@extends('app')

@section('content')
	<h2>Articles</h2>
	<hr>

		<h2>{{ $article->title }}</h2>
		
		<article>
		
			<div class="body">{{ $article->body }}</div>
		
		</article>

		<p>published by: {{ $article->user->name }}</p>

		@unless ($article->tags->isEmpty())
			<h5>Tags:</h5>
				<ul>
					@foreach($article->tags as $tag)
						<li>{{ $tag->name }}</li>
					@endforeach
				</ul>
	    @endunless
@stop