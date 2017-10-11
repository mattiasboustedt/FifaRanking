<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HallOfFame extends Model
{
    protected $fillable = [
        'user_id', 'title', 'current_champion', 'date'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
