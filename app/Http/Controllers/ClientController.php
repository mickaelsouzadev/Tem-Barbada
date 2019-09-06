<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\LoginController as Controller;
use App\Http\Requests\ClientRegisterRequest as RegisterRequest;
use App\Http\Requests\ClientLoginRequest as LoginRequest;
use App\Http\Requests\ClientUpdateRequest as UpdateRequest;
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

	public function store(RegisterRequest $request)
    {
	    $validated = $request->validated();

	    $imageName = null;

	    $data = [
	       	'email'=>$request->email,
			'password'=>Hash::make($request->password),
			'fantasy_name'=>$request->fantasy_name,
			'neighborhood'=>$request->neighborhood,
			'street'=>$request->street,
			'number'=>$request->number,
			'address_extra'=>$request->adress_extra,
			'phone_1'=>$request->phone_1,
			'phone_2'=>$request->phone_2,
			'state'=>$request->state,
			'city'=>$request->city,
			'categories_id'=>$request->categories_id
	    ];

	    if($request->logo) {

	    	$imageName = time().'.'.$request->logo->getClientOriginalExtension();

	    	$request->logo->move(public_path('img'), $imageName);

	    	$data['logo'] = $imageName;
	    }
   
	    return Client::create($data);
    }

    public function update(UpdateRequest $request, $id)
    {

    	
     	$validated = $request->validated();

     	$data = [
     	    'email'=>$request->email,
     		'fantasy_name'=>$request->fantasy_name,
     		'neighborhood'=>$request->neighborhood,
     		'street'=>$request->street,
     		'number'=>$request->number,
     		'address_extra'=>$request->adress_extra,
     		'phone_1'=>$request->phone_1,
     		'phone_2'=>$request->phone_2,
     		'state'=>$request->state,
     		'city'=>$request->city,
     		'categories_id'=>$request->categories_id
     	];

        $imageName = null;

        if(!is_string($request->logo)) {

	    	$imageName = time().'.'.$request->logo->getClientOriginalExtension();

	    	$request->logo->move(public_path('img'), $imageName);

	    	$data['logo'] = $imageName;
	    }

	    return Client::where('id', $id)->update($data);
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
