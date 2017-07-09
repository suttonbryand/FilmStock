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

Route::post('movies/search/', 'MoviesController@search');

Route::resource('movies','MoviesController');

Route::resource('users','UsersController');

Route::resource('ratings','RatingsController');

Route::get('/test', function(){
	echo config('app.name',"Fail");
});
