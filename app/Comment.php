<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    public static function create($attributes){
    	$comment = new \FilmStock\Comment();

    	$comment->body = $attributes->body;

    	$comment->parent_comment_id = $attributes->parent_comment_id;

    	$comment->rating_id = $attributes->rating_id;

    	$comment->user_id = \Auth::user()->id;

    	$comment->movie_id = $attributes->movie_id;

		if($attributes->media_type == Movie::URL_EPISODE){
			$comment->addEpisodeAttributes($attributes);
		}

    	$comment->save();

    	return $comment;
    }

    public function user(){
    	return $this->belongsTo('FilmStock\User');
    }

    public function movie(){
    	return \FilmStock\Movie::find($this->movie_id);
    }

    public function rating(){
    	return $this->belongsTo(\FilmStock\Rating::class);
    }

    public function likes(){
        return $this->hasMany(\FilmStock\Like::class);
    } 

    private function addEpisodeAttributes($attributes){
            $this->season_number = $attributes->season_number;
            $this->episode_number = $attributes->episode_number;
            $this->tv_id = $attributes->tv_id;
    }       


}
