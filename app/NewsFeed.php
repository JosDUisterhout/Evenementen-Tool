<?php

//Database model nieuweberichten

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    //Gegevens die uit het formulier gehaald mogen worden
    protected $fillable = [
        'content', 'event_id'
    ];


    //Geeft/geven relatie met andere database tabellen weer
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
