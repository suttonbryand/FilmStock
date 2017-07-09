@extends('layouts.app')

@section('content')

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" style="width: 300px;" src="{{ $movie->poster }}" alt="{{ $movie->name }}">
    </a>
  </div>
  <div class="media-body">
    <h1 class="media-heading">{{ $movie->name }}</h1>
    <h3>Director: {{ $movie->director }}</h3>
	<p>{{ $movie->summary }}</p>
  </div>
</div>

<div class="container-fluid form-group">
	<form method="POST" action="/ratings">
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