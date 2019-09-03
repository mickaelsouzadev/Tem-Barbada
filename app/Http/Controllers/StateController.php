<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
    public function index()
    {
        return State::all();
    }

    public function getDisponible()
    {
        return State::join('clients', 'clients.state', '=', 'states.id')->select('states.*')->get();
    }

}
