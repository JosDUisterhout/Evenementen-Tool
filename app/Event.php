<?php

//Database model evenementen

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //Gegevens die uit het formulier gehaald mogen worden
    protected $fillable = [
        'title', 'text_area', 'has_image', 'image_url', 'deleted'
    ];

    //Geeft/geven relatie(s) met andere database tabellen weer

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //
    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    //
    public function newsFeeds()
    {
        return $this->hasMany(NewsFeed::class);
    }


}
