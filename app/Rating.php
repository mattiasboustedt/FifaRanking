<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'rating', 'rating_change'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
