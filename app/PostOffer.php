<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\PostOffer as Authenticatable;

class PostOffer
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = [
        'offer_title', 'company', 'location'
    ];

}
