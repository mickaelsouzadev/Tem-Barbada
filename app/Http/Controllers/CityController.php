<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdService;
use App\City;

class CityController extends Controller
{
    
    public function index(Request $request)
    {
        return City::where('state', $request->state_id)->get();
    }

    public function getDisponible(Request $request, AdService $adService)
    {
        if($adService->verifyTime()) {
            return City::join('clients', 'clients.city', '=', 'cities.id')
            	->join('ads', 'ads.clients_id', '=', 'clients.id')
            	->where('cities.state', $request->state_id)
                ->where("ads.active", "=", 1)
            	->select('cities.*')
            	->groupBy('cities.id')
            	->get();
        }
    }
}
