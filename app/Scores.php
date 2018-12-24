<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{

    public function playedgame ()
    {

        return $this->belongsTo(PlayedGames::class);
    }

    public function user ()
    {

        return $this->belongsTo(User::class);
    }
}
