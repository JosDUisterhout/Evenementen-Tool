<?php

//Database model gebruikers

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //Gegevens die uit het formulier gehaald mogen worden
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Geeft/geven relatie met andere database tabellen weer

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
