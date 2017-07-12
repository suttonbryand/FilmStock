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
			@include('shared.comment-form')	
		</form>
	</div>