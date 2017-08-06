<?php

namespace App;

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
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rating()
    {
        return $this->hasOne('App\Rating');
    }

    public function aGames()
    {
        return $this->hasMany('App\Game', 'user_a_id');
    }

    public function bGames()
    {
        return $this->hasMany('App\Game', 'user_b_id');
    }

    public function games()
    {
        return Game::where('user_a_id', $this->id)->orWhere('user_b_id', $this->id);
    }

    public function statistics()
    {
        return $this->hasOne('App\Statistic');
    }
}