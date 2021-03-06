<?php

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
    protected $fillable = [
        'company_name', 'telephone', 'email', 'password', 'vat_number', 'registration_number', 'country', 'country_code',
        'offer_title','location', 'vacancy_details', 'candidate_skills',
        'name_contact_person', 'phone_number', 'event_title', 'event_description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
