@extends('shared.ratings')

@section('ratings-image')
	<img class="media-object index-image" src="{{ $rating->movie->poster_path_small }}" alt="{{ $rating->movie->title }}">
@endsection