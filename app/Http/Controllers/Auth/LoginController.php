<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{

	protected $guard;
	private $auth;

	public function __construct($guard = 'client')
	{
		$this->guard = $guard;
		$this->auth = Auth::guard($this->guard);
	}
    
	protected function authenticate($credentials)
	{
		
		if($this->auth->attempt($credentials)) {

			if(!$this->verifyEmail()) {
				return response()->json([
			    	'message'=>'Verifique seu email! Enviamos um email de confirmação para você!'
			    ], 400);
			}

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

	private function verifyEmail() 
	{
		if($this->guard === 'client') {

			$auth = $this->auth->user();

			if($auth->verified === 0) {

				$this->auth->logout();

				return false;

			}

		}
		
		return true;
	}
}
