<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;

class HomeController extends Controller
{
  
    public function index()
    {
        return view('home');
    }

    public function contact(Request $request)
    {
    	\Mail::to('tembarbada@tembarbada.com.br')->send(new ContactMail($request));
    }
}
