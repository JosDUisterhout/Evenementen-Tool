<?php

//Database model uitnodigingen

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    //Gegevens die uit het formulier gehaald mogen worden
    protected $fillable = [
        'email', 'event_id', 'status'
    ];

    //Geeft/geven relatie met andere database tabellen weer
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


}
