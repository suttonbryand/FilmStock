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

<div class="container-fluid">
	<h2 class="row">Rate Movie</h2>
	<div class="row">
		<div class="col-md-1">Rating:</div>
		<div class="col-md-4">
			<div class="btn-group" role="toolbar" aria-label="rating">
			  <div class="btn" role="group" aria-label="rating">1</div>
			  <div class="btn" role="group" aria-label="rating">2</div>
			  <div class="btn" role="group" aria-label="rating">3</div>
			  <div class="btn" role="group" aria-label="rating">4</div>
			  <div class="btn" role="group" aria-label="rating">5</div>
			  <div class="btn" role="group" aria-label="rating">6</div>
			  <div class="btn" role="group" aria-label="rating">7</div>
			  <div class="btn" role="group" aria-label="rating">8</div>
			  <div class="btn" role="group" aria-label="rating">9</div>
			  <div class="btn" role="group" aria-label="rating">10</div>
			</div>
		</div>
	</div>
	<h3 class="row">Add a Comment</h3>
	<textarea class="form-control row" rows="3"></textarea>
</div>

<div style="margin-top:30px;">
	<a href="#" class="btn btn-primary">Submit</a>
</div>


@endsection