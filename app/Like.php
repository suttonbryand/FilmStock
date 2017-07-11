<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public static function create($attributes){
    	$like = new Like();
    	$like->user_id = \Auth::user()->id;
    	$like->comment_id = $attributes->comment_id;
    	$like->rating_id = $attributes->rating_id;
    	$like->save();
    	return $like;
    }
}
