<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use Auth;

class AdController extends Controller
{
   
    public function showByState($state)
    {
        return view('ads')->with('data',  ['id' => $state, 'type' => 'state']);
    }

    public function showByCity($city)
    {
        return view('ads')->with('data', ['id' => $city, 'type' => 'city']);
    }

    public function getByState($state)
    {
        return Ad::join('clients', 'clients.id', '=', 'ads.clients_id')
            ->join('states', 'states.id', '=', 'clients.state')
            ->where('clients.state', $state)
            ->select('ads.*', 
                'clients.logo', 
                'clients.fantasy_name', 
                'clients.neighborhood',
                'clients.number',
                'clients.street',
                'clients.address_extra',
                'states.name as local_name')
            ->get();
    }

    public function getByCity($city)
    {
        return Ad::join('clients', 'clients.id', '=', 'ads.clients_id')
            ->join('cities', 'cities.id', '=', 'clients.city')
            ->where('clients.city', $city)
            ->select('ads.*', 
                'clients.logo', 
                'clients.fantasy_name', 
                'clients.neighborhood',
                'clients.number',
                'clients.street',
                'clients.address_extra',
                'cities.name as local_name')
            ->get();
    }

    public function store(Request $request)
    {
        return Ad::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'client_id'=>Auth::guard('client')->id()
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function getByClient($id)
    {
        return Ad::where('clients_id', $id)->get();
    }
}
