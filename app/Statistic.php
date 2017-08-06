<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'played_games', 'games_won', 'games_lost', 'games_drawn', 'goals_scored', 'goals_against', 'goal_difference'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}