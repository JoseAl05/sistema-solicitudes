<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App;


class PerfilSolicitanteController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	//Funcion que retorna la vista del perfil del solicitante. //
	public function mostrarPerfil()
	{
		$solicitante =  User::where('type', 'solicitante')->first();
		return view('PerfilSolicitante',compact('solicitante'));
	}
	
	
	
}
