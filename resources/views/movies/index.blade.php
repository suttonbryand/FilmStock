@extends('layouts.app')

@section('content')
@foreach ($movies as $movie)
	<a href="../movies/{{ $movie->id }}">
		<div class="media">
		  <div class="media-left">
		  	<img class="media-object index-image"  style="width:100px;" src="" alt="{{ $movie->title }}">
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading">{{ $movie->title }}</h4>
		    <p>{{ $movie->overview }}</p>
		  </div>
		</div>
	</a>
@endforeach
@endsection