<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest as Request;
use App\Services\ForgetPasswordService as Service;

class ForgetPasswordController extends Controller
{
    
	public function sendToken(Request $request, Service $service) 
	{
		$validated = $request->validated();

		if(!$service->sendToken($request)) {
			return response()->json([
			   'message'=>'Esse email não existe!'
			], 400);
		}

		return response()->json([
			'message'=>'Verifique seu email!'
		], 200);
	}

}
