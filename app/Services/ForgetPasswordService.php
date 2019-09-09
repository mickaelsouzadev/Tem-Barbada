<?php  

namespace App\Services;

use App\Repositories\ClientRepository;
use App\Mail\EmailResetPassword;


class ForgetPasswordService 
{
	protected $repository;

	public function __construct(ClientRepository $repository)
	{
 		$this->repository = $repository;
	}

	public function sendToken($request) 
	{
	 	$client = $this->repository->getByEmail($request->email);
	 	$client = $client->toArray();


	 	if($client == []) {
	 		return false;
	 	}


	 	$token = $this->defineToken($client[0]['id']);

	 	\Mail::to($request->email)->send(new EmailResetPassword($token));

	 	return true;
	}

	private function defineToken($id)
	{
		$token = sha1(time());
		$this->repository->update(['password_token' => $token], $id);

		return $token;
	}

}