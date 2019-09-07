<?php  

namespace App\Repositories\Interfaces;

interface ClientRepositoryInterface 
{
	public function all();

	public function getById($id);

	public function create($data);

	public function update($data, $id);

	public function delete($id);
}