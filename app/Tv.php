<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Tv extends Movie
{

    public static function find($id){
        $url = env('API_URL') . "tv/$id?" . env('API_KEY'); 

    	return Movie::find_helper($url,true);
    }

}
