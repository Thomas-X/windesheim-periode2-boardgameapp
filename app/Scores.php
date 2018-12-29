<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * The scores model, a score is connected to both a profile and playedgames, a polymorphic relationship should be used here to make these relations allow for multiple belongsTo's.
 * */
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
