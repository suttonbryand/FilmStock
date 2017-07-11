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
    	$episode = Movie::find_helper($url);
    	$episode->tv_id = $tv_id;
    	$episode->season_number = $season_number;
    	$episode->episode_number = $episode_number;
    	$episode->media_type = Movie::URL_EPISODE;
    	return $episode;
    }
}
