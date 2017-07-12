@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

	@include('shared.rating-form')

	<hr/>

  </div>
</div>

    @yield('episodes')

    @include('shared.ratings', ['ratings' => $rating_comments, 'is_user_page' => false]);)





@endsection
