<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Tv extends Movie
{

    public static function find($id){
        $url = env('API_URL') . "tv/$id?" . env('API_KEY'); 

    	return Movie::find_helper($url,true);
    }

    public static function latestReleases($daysBack = 30){
        $url = env('API_URL') . "discover/tv?air_date.gte=" . date("Y-m-d", strtotime("-$daysBack days")) . "&air_date.lte=" . date("Y-m-d") . "&sort_by=popularity.desc&" . env('API_KEY');
        return Movie::latestReleases_helper($url);
    }

}
