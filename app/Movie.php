<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class Movie extends Model
{

	public $id;
	public $title;
	public $director;
	public $overview;
	public $poster;
    
    public function ratings(){
    	return Rating::where('movie_id','=',$this->id)->orderBy('created_at','desc')->get();
    }

    public static function find($id){
    	$client = new Client();
        $res = json_decode($client->request('GET', 'movies.app/movies/' . $id)->getBody());

        $movie = new Movie();
        $movie->id = $res->id;
        $movie->title = $res->title;
        $movie->director = $res->director;
        $movie->overview = $res->overview;
        $movie->poster = $res->poster;

        return $movie;
    }

    public static function all($columns = array()){
        $client = new Client();
        return json_decode($client->request('GET', 'movies.app/movies')->getBody());
    }

    public static function latestReleases($daysBack = 30){
        $url = env('API_URL') . "discover/movie?primary_release_date.gte=" . date("Y-m-d", strtotime("-$daysBack days")) . "&primary_release_date.lte=" . date("Y-m-d") . "&sort_by=popularity.desc&" . env('API_KEY');
        $client = new Client();
        $res = json_decode($client->request('GET', $url)->getBody());
        return $res->results;
    }

}
