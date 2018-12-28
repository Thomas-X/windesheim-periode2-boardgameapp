<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    protected $fillable = [
        'score',
        'playedgames_id',
    ];

    public function playedgames ()
    {

        return $this->belongsTo(PlayedGames::class, 'playedgames_id');
    }

    public function profiles ()
    {

        return $this->belongsTo(Profiles::class, 'profiles_id');
    }
}
