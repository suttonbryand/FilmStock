@extends('layouts.show')

@section('rating-form')
	<div class="container-fluid form-group">
		<form method="POST" action="/rating/episode">
			{{ csrf_field() }}
			<input type="hidden" name="season_number" value="{{ $movie->season_number }}" />
			<input type="hidden" name="episode_number" value="{{ $movie->episode_number }}" />
			<input type="hidden" name="episode_id" value="{{ $movie->id }}" />
			<input type="hidden" name="tv_id" value="{{ $movie->tv_id}}" />
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