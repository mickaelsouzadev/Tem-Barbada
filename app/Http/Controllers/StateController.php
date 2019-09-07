<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdService;
use App\State;

class StateController extends Controller
{
    public function index()
    {
        return State::all();
    }

    public function getDisponible(AdService $adService)
    {
       if($adService->verifyTime()) {
            return State::join('clients', 'clients.state', '=', 'states.id')
                ->join('ads', 'ads.clients_id', '=', 'clients.id')
                ->where("ads.active", "=", 1)
                ->select('states.*')
                ->groupBy('states.id')
                ->get();
       }
   
    }

}
