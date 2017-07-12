<?php

namespace FilmStock;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    
        public static function create($attributes){
                $rating = new \FilmStock\Rating();
                $rating->score = $attributes->score;

                $rating->save();

                $attributes->rating_id = $rating->id;
                \FilmStock\Comment::create($attributes);

                return $rating;
        }

        public function user(){
                return $this->belongsTo('\FilmStock\User');
        }

        public function likes(){
                return $this->hasMany('\FilmStock\Like');
        }

        public function comments(){
                return $this->belongsTo('\FilmStock\Comment');
        }


}
