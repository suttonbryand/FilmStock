@extends('layouts.app')

@section('content')

<div class="media">
  <div class="media-left">
    <img class="media-object index-image" src="{{ $user->gravatar_link }}" alt="Profile image here">
  </div>
  <div class="media-body">
    <h1 class="media-heading">{{ $user->name }}</h1>
  </div>
</div>

<h2>Ratings</h2>

@foreach ($ratings as $rating)
	<a href="/movies/{{ $rating->movie->id }}">
		<div class="media">
		  <div class="media-left">
		  	<img class="media-object index-image" src="{{ $rating->movie->poster_path_small }}" alt="{{ $rating->movie->title }}">
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading">{{ $rating->movie->title }}</h4>
		    <p>{{ $rating->movie->overview }}</p>
		    <p>{{ $rating->comment }}</p>
		    <p>Rating: {{ $rating->score }}</p>
		  </div>
		</div>
	</a>
@endforeach

@endsection