@extends('layouts.show')

@section('rating-form')
	<div class="container-fluid form-group">
		<form method="POST" action="/rating/tv">
			{{ csrf_field() }}
			<input type="hidden" name="movie_id" value="{{ $movie->id }}" />
			<h2 class="row">Rate Movie</h2>
			<div class="row">
				<div class="col-md-1">Rating:</div>
				<div class="col-md-4">
					1
					<input type="radio" name="score" value="1" />
					<input type="radio" name="score" value="2" />
					<input type="radio" name="score" value="3" />
					<input type="radio" name="score" value="4" />
					<input type="radio" name="score" value="5" />
					<input type="radio" name="score" value="6" />
					<input type="radio" name="score" value="7" />
					<input type="radio" name="score" value="8" />
					<input type="radio" name="score" value="9" />
					<input type="radio" name="score" value="10" />
					10
				</div>
			</div>
			<h3 class="row">Add a Comment</h3>
			<textarea class="form-control row" rows="3" name="comment"></textarea>
		<div style="margin-top:30px;">
			<input type="Submit" class="btn btn-primary" value="Submit" />
		</div>	
		</form>
	</div>
@endsection

@section('episodes')

<div class="container-fluid">
	<div class="row">
		<h3>Season {{ $movie->number_of_seasons }}</h3>
	</div>
	@foreach($season->episodes as $episode)
	<a href="/tv/{{ $movie->id }}/season/{{ $movie->number_of_seasons }}/episode/{{ $episode->episode_number }}">
		<div class="row">
			<div class="col-md-2">{{ $episode->name }}</div>
			<div class="col-md-10">{{ $episode->overview }}</div>
		</div>
	</a>
	@endforeach
</div>

@endsection