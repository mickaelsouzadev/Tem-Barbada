<?php  

namespace App\Repositories\Interfaces;

interface AdRepositoryInterface 
{

	public function all();

	public function getByLocal(array $local, $localId);

	public function getByClient($clientId);

	public function create($data);

	public function update($data, $id);

	public function delete($id);

}