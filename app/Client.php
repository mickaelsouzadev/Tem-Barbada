<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'client';

    protected $fillable = [
       'email',
       'password',
       'fantasy_name',
       'neighborhood',
       'street',
       'number',
       'address_extra',
       'phone_1',
       'phone_2',
       'logo',
       'state',
       'city',
       'categories_id',
       'verify_register_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'foreign_key');
    }
}
