@extends('layouts.app')

@section('content')
@foreach ($movies as $movie)
	<a href="/{{ FilmStock\Movie::getURLWord($movie) }}/{{ $movie->id }}">
		<div class="media">
		  <div class="media-left">
		  	<img class="media-object index-image" src="{{ \FilmStock\Movie::smallPoster() }}{{ $movie->poster_path }}" alt="{{ FilmStock\Movie::getTitle($movie) }}">
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading">{{ FilmStock\Movie::getTitle($movie) }}</h4>
		    <p>{{ $movie->overview }}</p>
		  </div>
		</div>
	</a>
@endforeach
@endsection