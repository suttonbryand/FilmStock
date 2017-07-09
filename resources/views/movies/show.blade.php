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
		<div class="col-md-1">
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
				</ul>
			</div>
		</div>
	</div>
	<h3 class="row">Add a Comment</h3>
	<textarea class="form-control row" rows="3"></textarea>

</div>


@endsection