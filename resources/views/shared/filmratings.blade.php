@extends('shared.ratings')

@section('ratings-image')
	<img class="media-object" src=" {{ $rating->user->makeGravatarLink() }}" alt="...">
@endsection