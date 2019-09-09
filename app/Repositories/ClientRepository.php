<?php  

namespace App\Repositories;

use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Client;

class ClientRepository implements ClientRepositoryInterface
{
	
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function getById($id) {
		return $this->client::where('clients.id', $id)
	    	->join('categories', 'clients.categories_id', '=', 'categories.id')
	    	->join('cities', 'clients.city', '=', 'cities.id')
	    	->join('states', 'clients.state', '=', 'states.id')
	    	->select('clients.*', 'categories.name as category_name', 'cities.name as city_name', 'states.name as state_name')
	    	->get();
	}

	public function getByRegisterToken($token)
	{
		return $this->client::where('verify_register_token', $token)->get();
	}

	public function getByPasswordToken($token)
	{
		return $this->client::where('password_token', $token)->get();

	}

	public function getByEmail($email)
	{
		return $this->client::where('email', $email)->get();
	}

	public function all()
	{
		return $this->client::join('categories', 'clients.categories_id', '=', 'categories.id')
	    	->join('cities', 'clients.city', '=', 'cities.id')
	    	->join('states', 'clients.state', '=', 'states.id')
	    	->select('clients.*', 'categories.name as category_name', 'cities.name as city_name', 'states.name as state_name')
	    	->get();
	}

	public function create($data) {
		return $this->client::create($data);
	}

	public function update($data, $id) {
		return $this->client::where('id', $id)
				->update($data);
	}

	public function delete($id) {
		return $this->client::destroy($id);
	}
}
