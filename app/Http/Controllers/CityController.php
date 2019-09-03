<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    
    public function index(Request $request)
    {
        return City::where('state', $request->state_id)->get();
    }

    public function getDisponible(Request $request)
    {
        return City::join('clients', 'clients.city', '=', 'cities.id')->where('cities.state', $request->state_id)->select('cities.*')->get();
    }
}
