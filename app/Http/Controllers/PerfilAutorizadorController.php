<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App;
use Alert;
use App\Mail\SolicitudAprobada;
use App\Mail\SolicitudRechazada;
use App\SolicitudDeVentas;


class PerfilAutorizadorController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	
	//Funcion que retorna vista del perfil del autorizador. //
	public function mostrarPerfil()
	{
		return view('PerfilAutorizador');
	}
	
	
	//Funcion que modifica el estado de una solicitud pendiente y envia un correo de aviso al solicitante correspondiente. //
	public function modificarEstado(Request $request, $id)
	{
		$solicitud = \App\SolicitudDeVentas::find($id);
		if($request->estado != NULL)
		{
			$solicitud->estadoSolicitud = $request->estado;
		}
		if($request->observacion != NULL)
		{
			$solicitud->ObservacionEstado = $request->observacion;
		}
		$solicitud->save();
		
		$mostrarSolicitud = \App\SolicitudDeVentas::find($id);
		$usuario = \App\User::find($solicitud->user_id);
		$email = $usuario->email; 
		if($solicitud->estadoSolicitud == 'Aprobada')
		{
			\Mail::to($email)->send(new SolicitudAprobada($mostrarSolicitud));
		}
		if($solicitud->estadoSolicitud == 'Rechazada')
		{
			\Mail::to($email)->send(new SolicitudRechazada($mostrarSolicitud));
		}
		
		Alert::success('Éxito', 'Editado Correctamente');
		return redirect()->route('autorizadorTabla');	
	}
	
	
	//Funcion que retorna la vista para modificar el estado de la solicitud.//
	public function editarEstado($id)
	{
		$solicitud = \App\SolicitudDeVentas::find($id);
		return view('EditarEstado',compact('solicitud'));
	}
}
