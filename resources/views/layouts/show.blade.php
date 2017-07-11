@extends('layouts.app')

@section('content')

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="{{ $movie->poster_path_large }}" alt="{{ FilmStock\Movie::getTitle($movie) }}">
    </a>
  </div>
  <div class="media-body">
    <h1 class="media-heading">{{ FilmStock\Movie::getTitle($movie) }}</h1>
    <h3>Director: </h3>
	<p>{{ $movie->overview }}</p>

	<div class="container-fluid form-group">
		<form method="POST" action="/rating/{{ $movie->media_type }}">
			{{ csrf_field() }}
			@yield('episode-form')
			<input type="hidden" name="movie_id" value="{{ $movie->id }}" />
			@yield('rating-header');
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

	<hr/>

    @yield('episodes')

    @include('shared.ratings', ['ratings' => $ratings, 'is_user_page' => false]);)

  </div>
</div>



@endsection
