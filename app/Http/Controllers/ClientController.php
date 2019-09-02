<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController as Controller;
use App\Http\Requests\ClientLoginRequest as LoginRequest;
use App\Client;
use Auth;

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
	    return view('register');
	}

	public function show(Client $client)
	{
	    return Client::where('clients.id', Auth::id())
	    	->join('categories', 'clients.categories_id', '=', 'categories.id')
	    	->join('cities', 'clients.city', '=', 'cities.id')
	    	->join('states', 'clients.state', '=', 'states.id')
	    	->select('clients.*', 'categories.name as category_name', 'cities.name as city_name', 'states.name as state_name')
	    	->get();
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
