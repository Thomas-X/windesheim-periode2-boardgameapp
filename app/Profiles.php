<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * The profiles model, it has a user (if there is a user connected with this profile by a foreign key)
 * A profile can also have multiple scores, identifying which score belongs to which player
 * */
class Profiles extends Model
{
    protected $fillable = [
        'nickname',
        'totalGames'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function scores ()
    {
        return $this->hasMany(Scores::class);
    }
}
