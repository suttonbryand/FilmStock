@extends('layouts.app')

@section('content')

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="{{ $movie->poster_path_large }}" alt="{{ FilmStock\Movie::getTitle($movie) }}">
    </a>
  </div>
  <div class="media-body">
    <h1 class="media-heading">{{ FilmStock\Movie::getTitle($movie) }}</h1>
    <h3>Director: </h3>
	<p>{{ $movie->overview }}</p>
	@yield('rating-form')
	<hr/>

    @yield('episodes')

	@foreach($movie->ratings() as $rating)
		<?php $user = FilmStock\User::find($rating->user_id) ?>
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object" src=" {{ $user->makeGravatarLink() }}" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"> {{ $user->name }}</h4>
		    <h3>{{ $rating->score }}</h3>
		    <h3>{{ $rating->comment }}</h3>
		  </div>
		</div>
	@endforeach	
  </div>
</div>



@endsection
