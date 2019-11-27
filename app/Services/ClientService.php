<?php  

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\ClientRepository;
use App\Mail\EmailVerification;

class ClientService 
{

	protected $repository;

	public function __construct(ClientRepository $repository)
	{
		$this->repository = $repository;
	}

	public function getClientAll() 
	{
		return $this->repository->all();
	}

	public function getClientById($clientId) 
	{
		return $this->repository->getById($clientId);
	}

	public function createClient($request) 
	{
		$validated = $request->validated();

	    $imageName = null;

	    $data = $request->only('email', 
	    		'fantasy_name', 
	    		'neighborhood', 
	    		'street', 
	    		'number', 
	    		'address_extra', 
	    		'phone_1', 
	    		'phone_2',
	    		'state',
	    		'city',
	    		'categories_id');
	      
		$data['password'] = Hash::make($request->password);
		$data['verify_register_token'] = sha1(time());

	    if($request->logo) {

	    	$imageName = time().'.'.$request->logo->getClientOriginalExtension();

	    	$request->logo->move(public_path('img'), $imageName);

	    	$data['logo'] = $imageName;
	    }
   		
   		$client = $this->repository->create($data);

   		\Mail::to($client->email)->send(new EmailVerification($client));

   		return response()->json(['message'=>'Verifique seu email para confirmar o seu cadastro!'], 200);
	}

	public function updateClient($request, $clientId)
	{
		$validated = $request->validated();

		 $data = $request->only('email', 
	    		'fantasy_name', 
	    		'neighborhood', 
	    		'street', 
	    		'number', 
	    		'address_extra', 
	    		'phone_1', 
	    		'phone_2',
	    		'state',
	    		'city',
	    		'categories_id');

        if($request->hasFile('logo')) {

	    	$imageName = time().'.'.$request->logo->getClientOriginalExtension();

	    	$request->logo->move(public_path('img'), $imageName);

	    	$data['logo'] = $imageName;

	    }

		if($this->repository->update($data, $clientId)) {
			return response()->json($data);
		} 
	}

	public function deleteClient($ClientId)
	{
		if($this->repository->delete($ClientId)) {
			return response()->json([
                'success'=>true
            ], 200);
		}
	}

	public function verifyClient($token) {
		$client = $this->repository->getByRegisterToken($token)->toArray()[0];
	
		if(!$client['verified']) {
			$this->repository->update(['verified'=>1], $client['id']);

			return true;
		}
	}

}