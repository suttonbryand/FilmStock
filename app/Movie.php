<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;


class Movie extends Model
{

	public $id;
	public $title;
	public $director;
	public $overview;
	public $poster_path_large;
    
    public function ratings(){
    	return Rating::where('movie_id','=',$this->id)->orderBy('created_at','desc')->get();
    }

    public static function find($id){
        $url = env('API_URL') . "movie/$id?" . env('API_KEY'); 

    	$res = Movie::cache($url);

        $movie = new Movie();
        $movie->id = $res->id;
        $movie->title = $res->title;
        $movie->director = "";//$res->director;
        $movie->overview = $res->overview;
        $movie->poster_path_large = Movie::largePoster() . $res->poster_path;
        $movie->poster_path_small = Movie::smallPoster() . $res->poster_path;

        return $movie;
    }

    public static function all($columns = array()){
        $client = new Client();
        return json_decode($client->request('GET', 'movies.app/movies')->getBody());
    }

    public static function latestReleases($daysBack = 30){
        $url = env('API_URL') . "discover/movie?primary_release_date.gte=" . date("Y-m-d", strtotime("-$daysBack days")) . "&primary_release_date.lte=" . date("Y-m-d") . "&sort_by=popularity.desc&" . env('API_KEY');
        $res = Movie::cache($url);
        return $res->results;
    }

    public static function search($query){
        $url = env('API_URL') . "search/multi?" . env('API_KEY') . "&language=en-US&query=" . urlencode($query);
        $res = Movie::cache($url);
        return Movie::extrapolateMovies($res->results);
    }

    public static function largePoster(){
        return env('API_IMG') . env('IMG_LARGE');
    }

    public static function smallPoster(){
        return env('API_IMG') . env('IMG_SMALL');
    }

    private static function cache($url){
        $key = Movie::makeCacheKey($url);

        if (Cache::has($key)) {
            return (Cache::get($key));
        }
        else{
            $client = new Client();
            $response = json_decode($client->request('GET', $url)->getBody());
            Cache::put($key, $response, 360);
            return $response;
        }
    }

    private static function makeCacheKey($url){
        return 'route_' . str_slug($url);
    }

    private static function extrapolateMovies($container){
        $results = array();
        foreach($container as $item){
            if(property_exists($item,'media_type') && $item->media_type != "movie"){
                if(property_exists($item,'known_for')){
                    foreach($item->known_for as $i){
                        if($i->media_type == "movie"){
                            $results[] = $i;
                        }
                    }
                }
            }
            else{
                $results[] = $item;
            }
        }
        return $results;
    }

}
