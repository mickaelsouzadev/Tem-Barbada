<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as Controller;
use App\Http\Requests\ClientLoginRequest as LoginRequest;

class ClientController extends Controller
{
    
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index() 
	{

		// if(!Auth::check()) {
		// 	return redirect()->to('/home');
		// }

		return view('pannel');
	}

	public function create()
	{
	    
	}

	public function show(Client $client)
	{
	    //
	}

	public function store(Request $request)
    {
        
    }

    public function update(Request $request, Client $client)
    {
        
    }

    public function destroy(Client $client)
    {
        
    }

    public function login(LoginRequest $request) {

    	$validated = $request->validated();

    	$credentials = $request->only('email', 'password');

    	return $this->authenticate($credentials);

    }


}
