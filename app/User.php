<?php

namespace FilmStock;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ratings(){
        return $this->hasMany(Rating::class)->orderBy('created_at','desc');
    }

    public function friends(){
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id');
    }

    public function add_friend($friend_id)
    {
        $this->friends()->attach($friend_id);   // add friend
        $friend = User::find($friend_id);       // find your friend, and...
        $friend->friends()->attach($this->id);  // add yourself, too
    }
    public function remove_friend($friend_id)
    {
        $this->friends()->detach($friend_id);   // remove friend
        $friend = User::find($friend_id);       // find your friend, and...
        $friend->friends()->detach($this->id);  // remove yourself, too
    }

    public function makeGravatarLink(){
        return "https://www.gravatar.com/avatar/" . md5(trim(strtolower($this->email)));
    }


}
