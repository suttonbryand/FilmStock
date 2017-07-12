<?php

namespace FilmStock\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \FilmStock\User::find($id);
        $user->gravatar_link = $user->makeGravatarLink();
        $ratings = $user->rating_comments;
        $client = new Client();
        foreach($ratings as $rating){
            switch($rating['media_type']){
                case \FilmStock\Movie::URL_TV:
                    $rating['movie'] = \FilmStock\Tv::find($rating['movie_id']);
                    break;
                case \FilmStock\Movie::URL_MOVIE:
                    $rating['movie'] = \FilmStock\Movie::find($rating['movie_id']);
                    break;
                case \FilmStock\Movie::URL_EPISODE;
                    $rating['movie'] = \FilmStock\Episode::findEpisode($rating['tv_id'],$rating['season_number'],$rating['episode_number']);
                    break;
            }
        }
        return view('users.show',['user' => $user, 'rating_comments' => $rating_comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
