<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    public static function create($attributes){
    	$comment = new \FilmStock\Comment();

    	$comment->text = $attributes->text;

    	$comment->parent_comment_id = $attributes->parent_comment_id;

    	$comment->rating_id = $attributes->rating_id;

    	$comment->user_id = \Auth::user()->id;

    	$comment->save();

    	return $comment;
    }

    public function user(){
    	return $this->belongsTo('FilmStock\User');
    }    


}
