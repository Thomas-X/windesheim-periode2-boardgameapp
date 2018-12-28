<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayedGames extends Model
{
    protected $fillable = [
        'playedAt',
        'games_id'
    ];
    public function games ()
    {

        return $this->belongsTo(Games::class);
    }

    public function scores ()
    {

        return $this->hasMany(Scores::class);
    }
}
