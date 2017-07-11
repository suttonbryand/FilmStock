@extends('layouts.show')

@section('episode-form')
			<input type="hidden" name="season_number" value="{{ $movie->season_number }}" />
			<input type="hidden" name="episode_number" value="{{ $movie->episode_number }}" />
			<input type="hidden" name="episode_id" value="{{ $movie->id }}" />
			<input type="hidden" name="tv_id" value="{{ $movie->tv_id}}" />
@endsection

@section('rating-header')
	<h2 class="row">Rate Episode</h2>
@endsection