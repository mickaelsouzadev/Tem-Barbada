<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{

	protected $guard;

	public function __construct($guard = 'client')
	{
		$this->guard = $guard;
	}
    
	protected function authenticate($credentials)
	{
		
		if(Auth::guard($this->guard)->attempt($credentials)) {
    		return response()->json([
    			'message'=>'Foi galera!'
    		], 200);
    	} 

    	return response()->json([
    		'message'=>'Email ou senha incorreto(a)s'
    	], 400);
	}

	protected function logout($path = 'home')
	{
		Auth::guard($this->guard)->logout();
		return redirect($path);
	}

}
