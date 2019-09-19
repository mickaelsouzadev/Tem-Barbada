<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Requests\ClientLoginRequest as LoginRequest;

class AdminController extends LoginController
{
    
	public function __construct()
	{
		parent::__construct('admin');
	}

	public function index()
	{
		return view('admin/admin');
	}

	public function showLogin()
	{
		return view('admin/login');
	}

	public function login(LoginRequest $request)
	{
		$validated = $request->validated();

		$credentials = $request->only('email', 'password');

    	return $this->authenticate($credentials);
	}
}
