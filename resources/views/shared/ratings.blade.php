	@foreach($rating_comments as $comment)
		@include('shared.ratings-mini',['comment' => $comment, 'is_user_page' => $is_user_page, 'is_rating' => true])
		<div class="container-fluid">
			@foreach($comment->child_comments as $child_comment)
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-11">
						@include('shared.ratings-mini',['comment' => $child_comment, 'is_user_page' => false, 'is_rating' => false])
					</div>
				</div>
			@endforeach
		</div>
	@endforeach