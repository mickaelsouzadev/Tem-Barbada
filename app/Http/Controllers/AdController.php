<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
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

    public function store(AdRequest $request)
    {
        $validated = $request->validated();

        $data = $request->all();
        $data['clients_id'] = Auth::guard('client')->id();

        return Ad::create($data);
    }

    public function update(AdRequest $request, $id)
    {
        $validated = $request->validated();

        $ad = Ad::find($id);

        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->start_date = $request->start_date;
        $ad->end_date = $request->end_date;

        $ad->save();
    }

    public function destroy($id)
    {
        $deleted = Ad::find($id)->delete();

        if($deleted){
           return response()->json([
                'message'=>'Deletado!'
            ], 200);
        }
    }

    public function getByClient()
    {
        $id = $this->auth->id();

        return Ad::where('clients_id', $id)
                    ->join('clients', 'clients.id', '=', 'ads.clients_id')
                    ->select('ads.*', 'clients.logo')
                    ->get();
    }
}
