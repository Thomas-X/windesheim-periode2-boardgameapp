<?php

namespace App;

use App\Listeners\UserListener;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    protected static function boot ()
    {

        parent::boot();
        User::created(function (User $user) {
            Profiles::create([
                                 'nickname' => $user->name,
                             ]
            );
        }
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile ()
    {

        return $this->hasMany(Profiles::class);
    }
}
