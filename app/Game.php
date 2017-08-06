<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $fillable = [
        'user_a_id', 'user_b_id', 'user_a_score', 'user_b_score'
    ];

    public function userA()
    {
        return $this->belongsTo('App\User', 'user_a_id');
    }
    public function userB()
    {
        return $this->belongsTo('App\User', 'user_b_id');
    }
}