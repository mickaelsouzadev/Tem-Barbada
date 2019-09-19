<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Services\AdService;
use App\Ad;
use Auth;

class AdController extends Controller
{
   
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth::guard('client');
    }

    public function showByState($state)
    {
        return view('ads')->with('data',  ['id' => $state, 'type' => 'state']);
    }

    public function showByCity($city)
    {
        return view('ads')->with('data', ['id' => $city, 'type' => 'city']);
    }

    public function getByState($state, AdService $service)
    {
        return $service->getAdByLocal('state', $state);
    }

    public function getByCity($city, AdService $service)
    {
        return $service->getAdByLocal('city', $city);
    }

    public function store(AdRequest $request, AdService $service)
    {
        $created = $service->createAd($request, $this->auth->id());
       
        if(!$created) {
            return response()->json([
                'message'=>'Você atingiu seu limite de anúncios!'
            ], 400);
        }

        return $created;
    }

    public function update(AdService $service, AdRequest $request, $id)
    {
        return $service->updateAd($request, $id);
    }

    public function destroy(AdService $service, $id)
    {
       return $service->deleteAd($id);
    }

    public function getByClient(AdService $service)
    {
        return $service->getAdByClient($this->auth->id());
    }

}
