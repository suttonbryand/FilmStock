<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Episode extends Tv
{
    
    public static function getSeason($tv_id,$season_number){
    	$url = env('API_URL') . "tv/${tv_id}/season/${season_number}?" . env('API_KEY');
    	return Movie::cache($url);
    }

    public static function findEpisode($tv_id,$season_number,$episode_number){
    	$url = env('API_URL') . "tv/${tv_id}/season/${season_number}/episode/${episode_number}?" . env('API_KEY');
    	return Movie::find_helper($url,Movie::URL_EPISODE);
    }
}
