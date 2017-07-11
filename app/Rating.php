<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    
	public static function create($attributes){
		$rating = new \FilmStock\Rating();
        $rating->comment  = $attributes->comment;
        $rating->score    = $attributes->score;
        $rating->user_id  = \Auth::user()->id;
        $rating->movie_id = $attributes->movie_id;
        $rating->media_type = $attributes->media_type;

        if($rating->media_type == \FilmStock\Movie::URL_EPISODE){
        	$rating->addEpisodeAttributes($attributes);
        }
        $rating->save();
        return $rating;
	}

	private function addEpisodeAttributes($attributes){
        $this->season_number = $attributes->season_number;
        $this->episode_number = $attributes->episode_number;
        $this->tv_id = $attributes->tv_id;
        $this->movie_id = $attributes->episode_id;
	}
}
