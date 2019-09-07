<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController as Controller;
use App\Http\Requests\ClientRegisterRequest as RegisterRequest;
use App\Http\Requests\ClientLoginRequest as LoginRequest;
use App\Http\Requests\ClientUpdateRequest as UpdateRequest;
use App\Services\ClientService;
use App\Client;
use Auth;

class ClientController extends Controller
{

	protected $auth;
    
	public function __construct()
	{
		parent::__construct();
		$this->auth = Auth::guard('client');
	}
	
	public function index() 
	{

		return view('pannel');
	}

	public function create()
	{
	    return view('register');
	}

	public function show(ClientService $service)
	{
	    return $service->getClientById($this->auth->id());
	}

	public function showAll()
	{
		//
	}

	public function store(RegisterRequest $request, ClientService $service)
    {
	  
	    return $service->createClient($request);
    }

    public function update(UpdateRequest $request, ClientService $service, $id)
    {
     	return $service->updateClient($request, $id);
    }

    public function destroy(Client $client)
    {
        
    }

    public function login(LoginRequest $request) 
    {

    	$validated = $request->validated();

    	$credentials = $request->only('email', 'password');

    	return $this->authenticate($credentials);

    }

    public function verifyClient(ClientService $service, $token) 
    {
    	return $service->verifyClient($token);
    }


}
