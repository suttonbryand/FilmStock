<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Like extends Comment
{
    public static function create($attributes){
    	$like = new Like();
    	$like->user_id = \Auth::user()->id;
    	$like->comment_id = $attributes->comment_id;
    	$like->save();
    	return $like;
    }

}
