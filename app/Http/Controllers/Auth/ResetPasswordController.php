<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\ResetPasswordService as Service;

class ResetPasswordController extends Controller
{
    
	protected $token;

	public function index($token)
	{

		return view('new-password')->with(['token' => $token]);
	}

	public function resetPassword(Request $request, Service $service, $token)
	{
		
		if(!$service->verifyToken($token)) {
			return response()->json([
				'message'=>"Código de redefinição inválido, por favor solicite novamente"
			],400);
		}

		if(!$service->resetPassword($request->password, $token)) {
			return response()->json([
				'message'=>"Não foi possível redefinir a sua senha, solicite novamente ou tente mais tarde"
			],400);
		}

		return response()->json([
			'message'=>"Sua senha foi redefinida com sucesso!"
		],200);
	}	
}
