<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdController extends Controller
{
   
    public function showByState($state)
    {
        return Ad::join('clients', 'clients.id', '=', 'ads.clients_id')
            ->where('clients.state', $state)
            ->select('ads.*')
            ->get();
    }

    public function showByCity($city)
    {
        return Ad::join('clients', 'clients.id', '=', 'ads.clients_id')
            ->where('clients.city', $city)
            ->select('ads.*')
            ->get();
    }

    public function store(Request $request)
    {
        //
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
