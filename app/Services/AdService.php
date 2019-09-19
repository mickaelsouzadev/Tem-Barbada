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
		$this->verifyTime();
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
		
		return $this->repository->getByLocal($local, $localId);
	}

	public function getAdByClient($clientId) {
		return $this->repository->getByClient($clientId);
	}

	public function createAd($request, $clientId) 
	{
		$validated = $request->validated();

		if($this->verifyLimit($request->limit, $clientId)) {
			$data = $request->only('title', 'description', 'start_date', 'end_date');
       		$data['clients_id'] = $clientId;
       		
       		return $this->repository->create($data);
		}

		return false;
     
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

	protected function verifyLimit($limit, $id)
	{
		$data = $this->getAdByClient($id);

		if(count($data) == $limit) {
			return false;
		} 

		return true;
	}

	public function verifyTime()
	{
		$data = $this->repository->all();
		$ads = $data->toArray();
		$date = Carbon::now()->toDateString();

		foreach ($ads as $ad) {
			if($ad['end_date'] <= $date) {
				$this->repository->delete($ad['id']);
			} else if($ad['start_date'] <= $date) {
				$this->repository->update(['active'=>1], $ad['id']);
			} else if($ad['start_date'] >= $date) {
				$this->repository->update(['active'=>0], $ad['id']);
			}
		}

	}

}