<?php

namespace FilmStock\Http\Controllers;

use Illuminate\Http\Request;

class RatingsController extends Controller
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

    }

    public function store_tv(Request $request){
        $rating = $this->store_helper($request);
        $rating->media_type = \FilmStock\Movie::URL_TV;
        $rating->save();
        return redirect('/tv/' . $request->movie_id);        
    }

    public function store_movie(Request $request){
        $rating = $this->store_helper($request);
        $rating->media_type = \FilmStock\Movie::URL_MOVIE;
        $rating->save();
        return redirect('/movie/' . $request->movie_id); 
    }

    public function store_episode(Request $request){
        $rating = $this->store_helper($request);
        $rating->media_type = \FilmStock\Movie::URL_EPISODE;
        $rating->season_number = $request->season_number;
        $rating->episode_number = $request->episode_number;
        $rating->tv_id = $request->tv_id;
        $rating->movie_id = $request->episode_id;
        $rating->save();
    }

    private function store_helper(Request $request){
        $rating = new \FilmStock\Rating();
        $rating->comment  = $request->comment;
        $rating->score    = $request->score;
        $rating->user_id  = \Auth::user()->id;
        $rating->movie_id = $request->movie_id;
        return $rating;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
