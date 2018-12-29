<?php

namespace App;

use App\Listeners\UserListener;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/*
 * The user model, the user can have a profile connected with it with a hasMany relationship, could also be a one-to-one relationship.
 * Hooks into both when a tuple of this model is created / deleted to create and delete the associated profile. If there's no profile connected the delete will not delete anything since there won't be a profile with that user ID.
 * */
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
        User::deleted(function (User $user) {
            Profiles::destroy($user->id);
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
