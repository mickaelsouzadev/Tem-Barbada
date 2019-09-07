<?php  

namespace App\Services;

use App\Repositories\AdRepository;
use Carbon\Carbon;

class AdService 
{

	protected $repository;

	public function __construct(AdRepository $repository)
	{
		$this->repository = $repository;
	}

	public function getAdByLocal($type, $localId) 
	{

		$local = [
			'table'=>$type.'s',
			'field'=>$type
		];

		if($type === 'city') {
			$local['table'] = 'cities';
		}
	
		if($this->verifyTime()) {
			return $this->repository->getByLocal($local, $localId);
		}

		
	}

	public function getAdByClient($clientId) {
		return $this->repository->getByClient($clientId);
	}

	public function createAd($request, $clientId) 
	{
		$validated = $request->validated();

        $data = $request->only('title', 'description', 'start_date', 'end_date');
        $data['clients_id'] = $clientId;

        return $this->repository->create($data);
	}

	public function updateAd($request, $adId)
	{
		$validated = $request->validated();

		$data = $request->only('title', 'description', 'start_date', 'end_date');

		return $this->repository->update($data, $adId);
	}

	public function deleteAd($adId)
	{
		if($this->repository->delete($adId)) {
			return response()->json([
                'success'=>true
            ], 200);
		}
	}

	public function verifyTime()
	{
		$data = $this->repository->all();
		$ads = $data->toArray();
		$date = Carbon::now()->toDateString();

		foreach ($ads as $ad) {
			if($ad['start_date'] == $date) {
				$this->repository->update(['active'=>1], $ad['id']);
			} else if($ad['end_date'] == $date) {
				$this->repository->update(['active'=>0], $ad['id']);
			}
		}
	
		return true;

	}

}