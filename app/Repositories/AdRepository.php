<?php  

namespace App\Repositories;

use App\Repositories\Interfaces\AdRepositoryInterface;
use App\Ad;

class AdRepository implements AdRepositoryInterface
{
	
	protected $ad;

	public function __construct(Ad $ad)
	{
		$this->ad = $ad;
	}

	public function all()
	{
		return $this->ad::all();
	}

	public function getByLocal(array $local, $localId) 
	{
		
		$result = $this->ad::join("clients", "clients.id", "=", "ads.clients_id")
            ->join("{$local['table']}", "{$local['table']}.id", "=", "clients.{$local['field']}")
            ->where("clients.{$local['field']}", $localId)
            ->where("ads.active", "=", 1)
            ->select("ads.*", 
                "clients.logo", 
                "clients.fantasy_name", 
                "clients.email", 
                "clients.phone_1",
                "clients.phone_2",  
                "clients.neighborhood",
                "clients.number",
                "clients.street",
                "clients.address_extra",
                "{$local['table']}.name as local_name");

        if($local['table'] == 'states') {
        	$result->join("cities", "cities.id", "=", "clients.city")
        			->addSelect("cities.name as city");
        }
            
        return $result->get();
	}

	public function getByClient($clientId) {
		return $this->ad::where('clients_id', $clientId)
                ->join('clients', 'clients.id', '=', 'ads.clients_id')
                ->select('ads.*', 'clients.logo')
                ->get();
	}

	public function create($data) {
		return $this->ad::create($data);
	}

	public function update($data, $id) {
		return $this->ad::where('id', $id)
				->update($data);
	}

	public function delete($id) {
		return $this->ad::destroy($id);
	}
}
