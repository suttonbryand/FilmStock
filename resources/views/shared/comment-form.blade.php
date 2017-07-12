		    		@if(isset($for_comment))
		    			<textarea class="form-control row" rows="1" name="body"></textarea>
		    		@endif
		    		
		    		<div style="margin-top:30px;">
		    			@if (isset($for_like))
			    			<input class="btn btn-primary" type="submit" name="submission" value="Like" />
			    		@endif

			    		@if (isset($for_comment))
			    			<input class="btn btn-primary" type="submit" name="submission" value="Comment" />
			    		@endif
			    	</div>