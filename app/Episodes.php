<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Tv
{
    
    public static function getSeason($tv_id,$season_number){
    	$url = env('API_URL') . "tv/${tv_id}/season/${season_number}?" . env('API_KEY');
    	return Movie::cache($url);
    }
}
