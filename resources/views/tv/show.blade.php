@extends('layouts.show')

@section('episodes')

<div class="container-fluid">
	<div class="row">
		<h3>Season {{ $movie->number_of_seasons }}</h3>
	</div>
	@foreach($season->episodes as $episode)
	<div class="row">
		<div class="col-md-2">{{ $episode->name }}</div>
		<div class="col-md-10">{{ $episode->overview }}</div>
	</div>
	@endforeach
</div>

@endsection