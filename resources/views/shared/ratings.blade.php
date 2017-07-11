	@foreach($ratings as $rating)
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object" src=" {{ $is_user_page ? $rating->movie->poster_path_small : $rating->user->makeGravatarLink() }}" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"> {{ $rating->user->name }}</h4>
		    <h3>{{ $rating->score }}</h3>
		    <h3>{{ $rating->comment }}</h3>
		    <div>
		    	<form action="/rating/comment" method="POST">
		    		{{ csrf_field() }}
		    		<input type="hidden" name="rating_id" value="{{ $rating->id }}" />
		    		<input class="btn btn-primary" type="submit" name="submission" value="Like" />
		    		<input class="btn btn-primary" type="submit" name="submission" value="Comment" />
		    	</form>
		    </div>
		  </div>
		</div>
	@endforeach