<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayedGames extends Model
{

    public function game ()
    {

        return $this->belongsTo(Games::class);
    }

    public function scores ()
    {

        return $this->hasMany(Scores::class);
    }
}
