	@foreach($rating_comments as $comment)
		<div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object" src=" {{ $is_user_page ? $comment->movie->poster_path_small : $comment->user->makeGravatarLink() }}" alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"> {{ $comment->user->name }}</h4>
		    <h3>{{ $comment->rating->score }}</h3>
		    <h3>{{ $comment->body }}</h3>
		    <div>
		    	@foreach($comment->likes as $like)
		    		<span>{{ $like->user->name }}</span>
		    	@endforeach
		    </div>
		    	<form action="/rating/comment" method="POST">
		    		{{ csrf_field() }}
		    		<input type="hidden" name="comment_id" value="{{ $comment->id }}" />
		    		@include('shared.comment-form')
		    	</form>
		    </div>
		  </div>
		</div>
	@endforeach