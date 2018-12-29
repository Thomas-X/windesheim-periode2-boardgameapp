<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * The games model, a game can be played by having a "playedgames" model
 * */
class Games extends Model
{
    public static $validations = [
        'name' => 'required|string|min:3|max:255',
        'description' => 'required|string|min:3|max:5000'
    ];

    protected $fillable = [
        'name',
        'description'
    ];

    public function playedgames ()
    {

        return $this->hasMany(PlayedGames::class);
    }
}
