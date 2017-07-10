<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('movie/search/', 'MoviesController@search');

Route::resource('movie','MoviesController');

Route::resource('tv','TvController');

Route::get('/tv/{tv_id}/season/{season_number}/episode/{episode_number}', 'EpisodesController@show');

Route::resource('user','UsersController');

Route::post('rating/tv', 'RatingsController@store_tv');

Route::post('rating/tv/{tv_id}/season/{season_number}/episode/{episode_number}', 'RatingsController@store_episode');

Route::post('rating/movie', 'RatingsController@store_movie');

Route::resource('rating','RatingsController');

Route::get('/test', function(){
	echo config('app.name',"Fail");
});
