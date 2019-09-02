<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ClientLoginController extends Controller
{
    public function login(Request $request) 
    {
    	$email = $request['email'];
    	$password = $request['password'];

    	
    	
    }

    public function logout(Request $request) 
    {
    	Auth::logout();
    	return redirect('/home');
    }
}
