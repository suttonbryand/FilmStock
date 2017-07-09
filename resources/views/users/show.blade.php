@extends('layouts.app')

@section('content')

<div class="media">
  <div class="media-left">
    <a href="#">
    </a>
  </div>
  <div class="media-body">
    <h1 class="media-heading">{{ $user->name }}</h1>
  </div>
</div>

<h2>Ratings</h2>

@foreach ($ratings as $rating)
	<div class="media">
		  <div class="media-left">
		  	<img class="media-object index-image"  style="width:100px;" src="{{ $rating->movie->poster }}" alt="{{ $rating->movie->name }}">
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading">{{ $rating->movie->name }}</h4>
		    <p>{{ $rating->movie->summary }}</p>
		    <p>{{ $rating->comment }}</p>
		    <p>Rating: {{ $rating->score}}</p>
		  </div>
		</div>
@endforeach

@endsection