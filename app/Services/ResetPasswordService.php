<?php  

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\ClientRepository;

class ResetPasswordService 
{
	protected $repository;
	private $client;

	public function __construct(ClientRepository $repository)
	{
 		$this->repository = $repository;
	}

	public function resetPassword($password, $token) 
	{
	 	return $this->repository->update(
	 			['password' => Hash::make($password), 
	 			'password_token' => ''],
	 			$this->client['id']);
	}

	public function verifyToken($token) {
		$this->client = $this->repository->getByPasswordToken($token);
	 	$this->client = $this->client->toArray();
	 	
	 	if($this->client == []) {
	 		return false;
	 	}

	 	$this->client = $this->client[0];

	 	return true;
	}
	
}