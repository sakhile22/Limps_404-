<?php

namespace App;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\PostOffer as Authenticatable;

class PostOffer extends \PHPUnit\Framework\TestCase
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_title'
    ];

}
