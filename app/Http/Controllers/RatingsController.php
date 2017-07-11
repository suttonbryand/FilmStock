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
        $rating->media_type = \FilmStock\Movie::URL_TV;
        $rating = \FilmStock\Rating::create($request);
        return redirect('/tv/' . $request->movie_id);        
    }

    public function store_movie(Request $request){
        $request->media_type = \FilmStock\Movie::URL_MOVIE;
        $rating = \FilmStock\Rating::create($request);
        return redirect('/movie/' . $request->movie_id); 
    }

    public function store_episode(Request $request){
        $request->media_type = \FilmStock\Movie::URL_EPISODE;
        $rating = \FilmStock\Rating::create($request);
        return redirect('/tv/' . $request->tv_id . '/season/' . $request->season_number . '/episode/' . $request->episode_number);
    }

    public function comment(Request $request){
        dd($request);
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
