<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $guard = 'client';

    protected $fillable = [
        'fantasy_name', 'email', 'password', 'neighborhood', 'street', 'number', 'phone_1', ' phone_2 ',  'state', 'city', 'categories_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'foreign_key');
    }
}
