<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class Movie extends Model
{
	public $id;
	public $name;
	public $director;
	public $summary;
	public $poster;
    
    public function ratings(){
    	return $this->select()->orderBy('created_at','desc')->take(10)->get();
    }

    public static function find($id){
    	$client = new Client();
        $res = json_decode($client->request('GET', 'movies.app/movies/' . $id)->getBody());

        $movie = new Movie();
        $movie->id = $res->id;
        $movie->name = $res->name;
        $movie->director = $res->director;
        $movie->summary = $res->summary;
        $movie->poster = $res->poster;

        return $movie;
    }

}
