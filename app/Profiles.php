<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
