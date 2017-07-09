@foreach ($movies as $movie)
	<div>
		<h2> <a href="movies/{{ $movie['id'] }}">{{ $movie['name'] }} </a></h2>
	</div>
@endforeach