<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    public static function create($attributes){
    	$comment = new \FilmStock\Comment();

    	$comment->body = $attributes->body;

    	$comment->parent_comment_id = $attributes->comment_id;

    	$comment->rating_id = $attributes->rating_id;

    	$comment->user_id = \Auth::user()->id;

    	$comment->movie_id = $attributes->movie_id;

        if($attributes->media_type == Movie::URL_TV){
            $comment->tv_id = $attributes->movie_id;
        }

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
        switch($this->media_type()){
            case \FilmStock\Movie::URL_EPISODE:
                return \FilmStock\Episode::findEpisode($this->tv_id,$this->season_number,$this->episode_number);
                break;
            case \FilmStock\Movie::URL_TV:
                return \FilmStock\TV::find($this->movie_id);
                break;
            default:
                return \FilmStock\Movie::find($this->movie_id);
        }
    }

    public function rating(){
    	return $this->belongsTo(\FilmStock\Rating::class);
    }

    public function likes(){
        return $this->hasMany(\FilmStock\Like::class);
    } 

    public function child_comments(){
        return $this->hasMany(\FilmStock\Comment::class,'parent_comment_id','id');
    }

    public function media_type(){
        if(isset($this->episode_number))    return \FilmStock\Movie::URL_EPISODE;
        if(isset($this->tv_id))         return \FilmStock\Movie::URL_TV;
                                        return \FilmStock\Movie::URL_MOVIE;
    }

    private function addEpisodeAttributes($attributes){
            $this->season_number = $attributes->season_number;
            $this->episode_number = $attributes->episode_number;
            $this->tv_id = $attributes->tv_id;
    }       


}
