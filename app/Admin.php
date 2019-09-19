<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $guard = 'admin';

    protected $fillable = [
	    'email',
	    'password',
	    'username',
    ];

  	protected $hidden = [
        'password',
    ];
}
